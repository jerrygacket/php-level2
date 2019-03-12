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

function ajax_post(action, id, element) {
    console.log(action + id + element);
    $.post(
        "/index.php",
        {
            action: action,
            id: id,
            element: element
        },
        onAjaxSuccess
    );

    function onAjaxSuccess(data)
    {
        // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
        var arr = JSON.parse(data);
        alert(arr.message);
        document.getElementById('status_'+arr.id).innerHTML = 'Статус: ' + arr.newstatus;
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
 // для работы с корзиной
 // пока не надо
//~ function getCartResponse(data) {
    //~ //console.log(data);
    //~ var table = document.getElementById("goods_list");
    //~ switch (data['action']) {
        //~ case 'del':
            //~ var r = document.getElementById("good_" + data['id']);
            //~ var i = r.rowIndex;
            //~ table.deleteRow(i);
            //~ var sum = 0;
            //~ for (var i = 1, row; row = table.rows[i]; i++) {
                //~ sum = sum + parseFloat(row.cells[4].innerText);
            //~ }
            //~ document.getElementById('total').innerHTML = "Итого: " + sum;
            //~ if (sum == 0) {
                //~ document.getElementById('orderform').remove();
            //~ }
            //~ break;
        //~ case 'clr':
            //~ //сделал просто релоад. удалить все кроме заголовка не получилось
            //~ //всегда остается одна строка с товаром
            //~ location.reload();
            //~ break;
    //~ }
//~ }

function getGoodsResponse(data) {
    //console.log(data);
    if (data['result'] == 0) {
		alert(data['errorMessage']);
	} else {
		var rows = document.getElementById("catalog");
		switch (data['action']) {
			case 'getMoreGoods':
				document.getElementById("lastIndex").innerHTML = data['lastIndex'];
				rows.innerHTML = rows.innerHTML + data.result;
				break;
		}
	}
};
