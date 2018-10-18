
function preProcessArray(inputArray){
    alert('Pre-Processing data...')
    var returnList=[];
    inputArray.forEach( function(i){
        returnList.push(preProcessData(i));
    })
    return returnList;
}

function preProcessData(inputRow){
        
    var date= inputRow[0];
    var date_processed = preProcessDate(date);
    
    var town = inputRow[1];
    var town_processed = preProcessTown(town);
 
    var flat_type = inputRow[2];
    var flat_type_processed = preProcessFlat(flat_type);
    
    var block_street =inputRow.slice(3,5);
    var block_street_processed = preProcessBlockStreet(block_street);
    
    var storey_range = inputRow[5];
    var storey_range_processed = preProcessStorey(storey_range);
    
    var floor_area = inputRow[6];
    var floor_area_processed = preProcessArea(floor_area);
    
    var flat_model = inputRow[7];
    var flat_model_processed = preProcessFlatModel(flat_model);
    
    var lease = inputRow[8];
    var lease_processed = preProcessLease(lease);
    
    var remaining_lease = inputRow[9];
    var remaining_lease_processed = preProcessLeaseRemainder(remaining_lease);
    
    var resale_price = inputRow[10];
    var resale_price_processed = preProcessPrice(resale_price);
    
    return [].concat(date_processed).concat(town_processed).concat(flat_type_processed).concat(block_street_processed).
            concat(storey_range_processed).concat(floor_area_processed).concat(flat_model_processed).
            concat(lease_processed).concat(remaining_lease_processed).concat(resale_price_processed);
}

function preProcessDate(date){
    //use convert date helper to get what we want
    return convertDate(date);
}
function preProcessTown(town){
    //TODO we need to determine all possible towns and then use one-hot encoding to encode this field
    // There are 26 unique towns.
    //[ANG MO KIO,BEDOK,BISHAN,BUKIT BATOK,BUKIT MERAH,BUKIT PANJANG,BUKIT TIMAH,CENTRAL AREA,CHOA CHU KANG,CLEMENTI,GEYLANG,HOUGANG,JURONG EAST,JURONG WEST,KALLANG/WHAMPOA,MARINE PARADE,PASIR RIS,PUNGGOL,QUEENSTOWN,SEMBAWANG,
    //SENGKANG,SERANGOON,TAMPINES,TOA PAYOH,WOODLANDS,YISHUN]
    var map_array=['ANG MO KIO','BEDOK','BISHAN','BUKIT BATOK','BUKIT MERAH','BUKIT PANJANG',
        'BUKIT TIMAH','CENTRAL AREA','CHOA CHU KANG','CLEMENTI','GEYLANG','HOUGANG','JURONG EAST','JURONG WEST',
        'KALLANG/WHAMPOA','MARINE PARADE','PASIR RIS','PUNGGOL','QUEENSTOWN',
        'SEMBAWANG','SENGKANG','SERANGOON','TAMPINES','TOA PAYOH','WOODLANDS','YISHUN'];
    var result = new Array(26).fill(0);
    for (i = 0; i <map_array.length;i++){
        if (town==map_array[i]){
            result[i]=1;
        }
    }
    return result;
}
function preProcessFlat(flat_type){
    //TODO we need to determine all possible flat types then use one-hot encoding
    //7 possible types
     var map_array=['1 ROOM','2 ROOM','3 ROOM','4 ROOM','5 ROOM','EXECUTIVE','MULTI-GENERATION'];
     var result = new Array(7).fill(0);
    for (i = 0; i <map_array.length;i++){
        if (flat_type==map_array[i]){
            result[i]=1;
        }
    }
    return result;
}

function preProcessBlockStreet(block_street){
    //block street is intuitively difficult to manage, so we shall ignore
    return [];
}
function preProcessStorey(storey_range){
    /* we might be able to simply take the middle of the X to Y(eg, 1 to 3 = 2) and come up with a primitive variable
    we can then also choose not to one-hot encode the data and instead take use the values as-is
    because intuitively the height of a building does correlate to its price premium.
    */
    var split = storey_range.split(" TO ");
    return ((parseInt(split[0])+parseInt(split[1]))/2);
}
function preProcessArea(floor_area){
    //TODO we can consider pre-processing this value such as normalisation
    return floor_area;
}
function preProcessFlatModel(flat_model){
    //TODO we need to determine all possible flat models then use one-hot encoding
    //21 unique flat models
    var map_array=['Improved','New Generation','Model A','Standard','Simplified',
        'Premium Apartment','Maisonette','Apartment','Model A2','Type S1','Type S2',
        'Adjoined flat','Terrace','DBSS','Model A-Maisonette','Premium Maisonette',
        'Multi Generation','Premium Apartment Loft','Improved-Maisonette','2-room','Premium Apartment'];
     var result = new Array(21).fill(0);
    for (i = 0; i <map_array.length;i++){
        if (flat_model==map_array[i]){
            result[i]=1;
        }
    }
    return result;
}
function preProcessLease(lease){
    //TODO we can consider pre-processing this value such as normalisation
    return lease;
}
function preProcessLeaseRemainder(remaining_lease){
    //TODO we can consider pre-processing this value such as normalisation
    return remaining_lease;
}
function preProcessPrice(resale_price){
    // we should return the resale price as is to preserve the prediction value
    return resale_price;
}