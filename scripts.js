
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
    return town;
}
function preProcessFlat(flat_type){
    //TODO we need to determine all possible flat types then use one-hot encoding
    return flat_type;
}
function preProcessBlockStreet(block_street){
    //block street is intuitively difficult to manage, so we shall ignore
    return [];
}
function preProcessStorey(storey_range){
    //TODO we need to determine all possible flat models then use one-hot encoding
    return storey_range;
}
function preProcessArea(floor_area){
    //TODO we can consider pre-processing this value such as normalisation
    return floor_area;
}
function preProcessFlatModel(flat_model){
    //TODO we need to determine all possible flat models then use one-hot encoding
    return flat_model;
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