function convertDate(date){
    //we define date has number of months after 2015
    var str = date.toString().split("-");
    var year = parseInt(str[0]);
    var mth = parseInt(str[1]);
    return (year-2015 + mth).toString();
}


