<html>
<header>
<title>pdf</title>
<meta http-equiv="Content-Language" content="th" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body {
font-family: 'sarabun_new', sans-serif;
font-size: 20px;

}
        font-size: 16px;
        }
        @page {
            size: A4;
            padding: 15px;
        }
        @media print {
            html,
            body {
                width: 210mm;
                height: 297mm;
                /*font-size : 16px;*/
            }
        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 15px;
            text-align: center;
        }

</style>
</header>
<body>
    <h3> ข้อมูลการลางาน ประจำเดือน {{$monthName }}    </h3>
 <table>
     <thead>
        <tr>
            <th>No</th>
            <th>ชื่อ</th>
            <th>ตำแหน่ง</th>
            <th>วันที่ลา</th>
            <th>ประเภทการลา</th>
            <th>จำนวนวันที่ลา</th>
            
        </tr>
     </thead>
     <tbody>
         @foreach ($data as $i => $value)
         <tr>
             <td>{{$loop->iteration}}</td>
            <td>{{$value->names}}</td>
            <td>{{$value->positions}}</td>
            <td>{{ date('j-M-Y', strtotime($value->date)) }}</td>
            <td>{{$value->topic}}</td>
            <td>{{$value->days}}</td>
        </tr>
         @endforeach

     </tbody>
 </table>
</body>
</html>