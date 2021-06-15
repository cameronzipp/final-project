let catArea = document.getElementById("categoryList");

$(function(){
    $.ajax({
        type:'GET',
        url: 'model/categoryGet.php?function=retrieveCategories',
        success: function (data){
            console.log('success', data);
            let cat = JSON.parse(data);
            console.log(cat);
            let result = "In stock: ";

            cat.forEach(function (c){
                console.log(c);
                result += c.typeLabel + ", ";
            });
            console.log()
            catArea.innerText = result.substring(0, result.length - 2);
        }
    });
});





