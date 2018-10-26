function convertDate(date){
    //we define date has number of months after 2015
    var str = date.toString().split("-");
    var year = parseInt(str[0]);
    var mth = parseInt(str[1]);
    return ((year-2015)*12 + mth).toString();
}

function getX(arr){
    var res = arr.map(function(val){
        return val.slice(0,-1);
    });
    return res;
}

function getY(arr){
       var column = [];
       for(var i=0; i<arr.length; i++){
           var x = parseInt(arr[i][61])
          column.push(x);
       }
       return column;
}

function shuffle(originalArray) {
  var array = [].concat(originalArray);
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}