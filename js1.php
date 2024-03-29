<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    async function getDataFromAPI() {
    let response = await fetch('https://data.go.th/dataset/296f32c6-8c7e-4a54-ade0-0913d35d3168/resource/d132638d-a243-4829-aed8-10ed4fad917f/download/priv_hos.json')
    let rawData = await response.text() // อ่านผลลัพธ์
    let objectData = JSON.parse(rawData) // แปลผลลัพธ์เป็น object
    let result = document.getElementById('result') // ดึง <ul> เพื่อใช้ในการเพิ่มแท็ก <li>

    for (let i = 0; i < objectData.features.length; i++) {
    let content = 'ชื่อโรงพยาบาล :'+ objectData.features[i].properties.name // ดึงข้อมูลจาก object
    content += "(" + objectData.features[i].properties.num_bed + ")"
    let li = document.createElement('li')
    li.innerHTML = content
    result.appendChild(li)
    }
}
getDataFromAPI() // เรียกฟังก์ชัน
</script>   
</head>
<body>
    <h1>โรงพยาบาลเอกชน ในกทม.</h1>
    <ol id="result"></ol>
</body>
</html>