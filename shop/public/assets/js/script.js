function myFunction(id,btn) {
  var y = document.getElementById("feedback-"+id);
  var x = document.getElementById("editForm-"+id);
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    document.getElementById("btn-"+id).innerHTML = "Скрыть";
  } else {
    x.style.display = "none";
    y.style.display = "block";
    document.getElementById("btn-"+id).innerHTML = "Править";
  }
}

function ajax_post(element, action, id) {
    console.log(action + id + element);
    $.post(
        "/index.php",
        {
            page: element,
            action: action,
            id: id,
        },
        onAjaxSuccess
    );

    function onAjaxSuccess(data)
    {
        // Здесь мы получаем данные, отправленные сервером и выводим их на экран.

        // var arr = JSON.parse(data);
        alert(data);
        // document.getElementById('status_'+arr.id).innerHTML = 'Статус: ' + arr.newstatus;
    }
}

function ajax_get(action, id_product, quantity, callback) {
    var lastIndex = parseInt(document.getElementById("lastIndex").innerHTML);
    var url = "http://shop/?action=" + action + "&id_product=" + lastIndex + "&quantity=" + quantity;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //console.log('responseText:' + xmlhttp.responseText);
            console.time();
            try {
                var data = JSON.parse(xmlhttp.responseText);
            } catch(err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }
            callback(data);
            console.timeEnd();
        }
    };
 
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function cartAdd(id) {
    $.post(
        "/index.php",
        {
            asAjax:true,
            element: 'cart',
            action: 'add',
            id: id,
            count: document.getElementById('good_count'+id).value,
        },
        onAjaxSuccess
    );

    function onAjaxSuccess(data)
    {
        // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
        var arr = JSON.parse(data);
        console.log(arr.result);
        document.getElementById('goods_count').innerHTML = arr.result.cart_count;
    }
}

function cartSet(id) {
    $.post(
        "/index.php",
        {
            asAjax:true,
            element: 'cart',
            action: 'set',
            id: id,
            count: document.getElementById('good_count'+id).value,
        },
        onAjaxSuccess
    );

    function onAjaxSuccess(data)
    {
        // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
        var arr = JSON.parse(data);
        console.log(arr.result);
        document.getElementById('cart_count').innerHTML = arr.result.cart_count;
        document.getElementById('cart_cost').innerHTML = arr.result.cart_cost;
        document.getElementById('goods_count').innerHTML = arr.result.cart_count;
    }
}

function cartDel(id) {
    $.post(
        "/index.php",
        {
            asAjax:true,
            element: 'cart',
            action: 'del',
            id: id,
            count: document.getElementById('good_count'+id).value,
        },
        onAjaxSuccess
    );

    function onAjaxSuccess(data)
    {
        // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
        var arr = JSON.parse(data);
        console.log(arr.result);
        document.getElementById('good_row'+id).remove();
        document.getElementById('goods_count').innerHTML = arr.result.cart_count;
        document.getElementById('cart_count').innerHTML = arr.result.cart_count;
        document.getElementById('cart_cost').innerHTML = arr.result.cart_cost;
        if (arr.result.cart_count === 0) {
            document.getElementById('cart').innerHTML = "Корзина пуста";
        }
    }
}