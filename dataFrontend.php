<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>หน้าเว็บแอพพลิเคชัน</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <!--สร้างปุ่มดึงข้อมูล -->
    <button id="ajaxBtn">ดึงข้อมูลจาก dataService</button>

    <!-- พิ้นที่แสดงผลข้อมูล -->
     <div id="dataDisplay"></div>

     <!-- Code ดึงข้อมูล อาศัย jQuery -->
      <script type="text/javascript">
        $(document).ready(function () {
            $('#ajaxBtn').click(function(){
                $.get('http://edurmu.com/dataService.php', function(data, textStatus, jqXHR){
                    try {
                        const dataJson =JSON.parse(data);

                        if (Array.isArray(dataJson)) {

                            const displayArea = $("#dataDisplay");
                            displayArea.empty();

                            const ul = $('<ul>');
                            dataJson.forEach(function (item){
                                const li = $('<li>').text(item.product_name + 'ราคา: ' +item.product_price);
                                ul.append(li);
                            })

                            displayArea.append(ul);
                            
                        } else {
                            console.error("Data is not an array:", dataJson);
                            $("#dataDisplay").text("ข้อมูลผิดพลาด: รูปแบบข้อมูลไม่ถูกต้อง");
                            }

                            
                    }catch (error){
                        console.error("Data is not an array:", dataJson);
                        $("#dataDisplay").text("ไม่สามารถดึงข้อมูลได้"); 
                    }
                })
            })
        })
      </script>
</body>





</html>