<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JS</title>
    <style>
        #hide {
            margin: 10px;
            padding: 25px;
            background: teal;
            color: white;
            display: none;
        }
        #ketqua {
            margin: 28px;
            padding: 30px;
            background: #9B070A;
            color: white;
        }
        #tieude {
            margin: 28px;
            padding: 30px;
        }
        #dongho {
            margin: 30px;
            font-size: 5em;
            font-weight: bold;
            color: red;
        }
        #mainqc {
            position: fixed;
            right:0px;
            bottom: 0;
            width: 300px;
        }
        #tatqc, #moqc {
            width: 80%;
            padding: 10px;
            background: teal;
            text-align: right;
        }
        #moqc {
            display: none;
        }
        a {
            color:white;
            text-decoration: none;
        }
        a: hover{
            text-decoration: underline;
        }
        #date {
            width: 800px;
            margin: 20px ;
            text-algin: center;
            background: teal;
            color: white;
            padding: 20px;
            font-family: arial;
            font-size: 2em;
        }
        #time {
            margin: 30px auto;
            width: 500px;
            padding: 30px;
            font-family: verdana;
            font-size: 5em;
            background: teal;
            color: white;
            border-radius: 10px;
        }
        table {
            width: 70%;
            font: 17px Calibri;
        }
        table, th, td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="">
</head>
<body>
<!-- Ẩn hiện nội dung -->
    <input type="button" value="show" onClick="hien()"/>
    <input type="button" value="hide" onClick="an()"/>
    <div id="hide">
        Thành rất đẹp trai
    </div>
    <script>
        function hien(){
            document.getElementById("hide").style.display = "block";
        }
        function an(){
            document.getElementById("hide").style.display = "none";
        }
    </script>
<!-- Thực hiện các phép toán cơ bản -->
    <div id="tieude">
    <h5>Phép toán cơ bản:</h5>
    <input type="text" id="soa" />
    <input type="text" id="sob" />
    <input type= "button" value=" Phép cộng" onClick="tong()" />
    <input type= "button" value=" Phép trừ" onClick="hieu()" />
    <input type= "button" value=" Phép nhân" onClick="tich()" />
    </div>
    <div id="ketqua"></div>

    <script>
        function tong(){
            //Lấy dữ liệu từ textBox:
            var a = document.getElementById("soa").value;
            var b = document.getElementById("sob").value;
            c= parseInt(a) + parseInt(b);
            document.getElementById("ketqua").innerHTML= a + "+" + b + "=" + c;
        }
        function hieu(){
            //Lấy dữ liệu từ textBox:
            var a = document.getElementById("soa").value;
            var b = document.getElementById("sob").value;
            c= parseInt(a) - parseInt(b);
            document.getElementById("ketqua").innerHTML= a + "-" + b + "=" + c;
        }
        function tich(){
            //Lấy dữ liệu từ textBox:
            var a = document.getElementById("soa").value;
            var b = document.getElementById("sob").value;
            c= parseInt(a) * parseInt(b);
            document.getElementById("ketqua").innerHTML= a + "*" + b + "=" + c;
        }
    
    </script>
<!-- Đồng hồ đếm ngược -->
     <div id="tieude">
    <h5>Đồng hồ đếm ngược:</h5>
    <div id="dongho"></div>
   
    <script>
    var so=10;
    function demNguoc(){
        so--;
        if (so != 0){
            document.getElementById("dongho").innerHTML = so;
            setTimeout("demNguoc()",1000);
        }
        else {
            document.getElementById("dongho").innerHTML = "Hết thời gian!";
            // window.location.href="http://127.0.0.1:8000/dangnhap"
        }
    }
    demNguoc();
    </script>
    </div>
<!-- Ẩn hiện quảng cáo -->
    <div id="mainqc">
        <div id="tatqc">
            <a href="#" onClick="hide()">Tắt quảng cáo</a>
        </div>
        <div id="picqc">
        <a href="#">
            <img src="home/img/thanh.jpg" width= "200px" height= "150px">
        </a>
        </div>
        <div id="moqc">
            <a href="#" onClick="show()">Mở quảng cáo</a>
        </div>
    </div>
    <script>
        function hide() {
            document.getElementById("tatqc").style.display="none";
            document.getElementById("picqc").style.display="none";
            document.getElementById("moqc").style.display="block";
        }
        function show() {
            document.getElementById("tatqc").style.display="block";
            document.getElementById("picqc").style.display="block";
            document.getElementById("moqc").style.display="none";
        }
    </script>
<!-- Hiện thị ngày tháng -->
    <div id="date"></div>
    <script>
    var d= new Date();
    var ngay= ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"];
    var thang= ["1","2","3","4","5","6","7","8","9","10","11","12"];
    document.getElementById("date").innerHTML = "Hôm nay, " + ngay[d.getDay()] + " ngày " + d.getDate() + " tháng " + thang[d.getMonth()] + " năm " + d.getFullYear(); 
    </script>
<!-- Hiển thị thời gian -->
<div id= "time"></div>
    <script>
        function dongho(){
            var time = new Date();
            var gio = time.getHours();
            var phut= time.getMinutes();
            var giay= time.getSeconds();
            if (gio <10)
                gio= "0"+gio;
            if (phut <10)
                phut= "0"+phut;
            if (giay <10)
                giay= "0"+giay;
            document.getElementById("time").innerHTML = gio + ":" + phut + ":" + giay;
            setTimeout("dongho()",1000);
        }
        dongho();
    </script>
<!-- Thêm vào bảng -->
<div onload="createTable()">
    <ps>Click the "Add New Row" button to add row to the table. Enter values in each row and press the "Submit Data" button. You can check the result in your browsers console window.</p>
    <p>
        <input type="button" id="addRow" value="Add New Row" onclick="addRow()" />
    </p>

    <!--THE CONTAINER WHERE WE'll ADD THE DYNAMIC TABLE-->
    <div id="cont"></div>

    <p><input type="button" id="bt" value="Submit Data" onclick="submit()" /></p>
    <p>(See the result in the console window.)</p>
</div>
    <script>
    // ARRAY FOR HEADER.
    var arrHead = new Array();
    arrHead = ['', 'Emp. Name', 'Designation', 'Age'];      // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
    function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');            // SET THE TABLE ID.

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');          // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // ADD THE TABLE TO YOUR WEB PAGE.
    }

    // ADD A NEW ROW TO THE TABLE.s
    function addRow() {
        var empTab = document.getElementById('empTable');

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
                // ADD A BUTTON.
                var button = document.createElement('input');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');

                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);
            }
            else {
                // CREATE AND ADD TEXTBOX IN EACH CELL.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');

                td.appendChild(ele);
            }
        }
    }

    // DELETE TABLE ROW.
    function removeRow(oButton) {
        var empTab = document.getElementById('empTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.
    }

    // EXTRACT AND SUBMIT TABLE DATA.
    function submit() {
        var myTab = document.getElementById('empTable');
        var values = new Array();

        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {   // EACH CELL IN A ROW.

                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    values.push("'" + element.childNodes[0].value + "'");
                }
            }
        }
        
        // SHOW THE RESULT IN THE CONSOLE WINDOW.
        console.log(values);
    }
    </script>
</body>
</html>