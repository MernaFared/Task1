



<!DOCTYPE html>
<html lang="en">
<head>

<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Report Table</title>
<style>

    body{
        font-family: 'Amiri', sans-serif;

    }
    .myTable{
        padding: 10px;
        border-collapse: separate;
        border-spacing: 10px; /* Adjust spacing between cells */
        width: 100%;
        direction: rtl; /* Right-to-left direction */
    }
    th, td, tr {
        text-align: center;
        padding: 5px;
    }
    th {
        background-color: #f2f2f2;
    }

    td input[type="checkbox"] {
        border: none;
    }
    th.border-cell {
        border: 1px solid #000000;
    }
    th.border-cell input[type="checkbox"] {
        border: none;
    }
    td.border-cell {
        border: 1px solid #000000;
    }
    td.border-cell input[type="checkbox"] {
        border: none;
    }


.centered-box {
    text-align: center;
    margin-top: 20px;
}
.dynamic-text-box {
    display: inline-block;
        padding: 5px;
        border: 1px solid #000000;
        margin-right: 10px;
        width: 100px;
        vertical-align: middle;
}
.additional-text {
    display: inline-block;
    vertical-align: middle;
}

.title-box {
    font-size: 16px;
    font-weight: bold;
    background-color: #f2f2f2;
    padding: 5px;
    border: 1px solid #000000;
    display: inline-block;
    margin: 10px;
    text-align: center;
    width: auto;
}
.my-box {
    font-size: 16px;
    font-weight: bold;
    background-color: #f2f2f2;
    padding: 5px;
    border: 1px solid #000000;
    display: block;
    margin: 10px auto; /* Auto margin on left and right */
    text-align: center;
    width: 120px;
}
.my-box2 {
    font-size: 16px;
    font-weight: bold;
    background-color: transparent;
    padding: 5px;
    border: 1px solid #000000;
    display: block;
    margin: 10px auto; /* Auto margin on left and right */
    text-align: center;
    width: 200px;

}
.day-box{
    font-size: 22px;
    font-weight: bold;
    text-align: center;
}

.small-title-container {
    text-align: center;
}


.row {
            display: flex;
            align-items: center;
        }
        .my-label {
            margin-right: 10px;
        }
        .my-bordered-box {
            font-size: 16px;
    background-color: transparent;
    padding: 5px;
    border: 1px solid #000000;
    display: block;
    margin: 10px auto; /* Auto margin on left and right */
    text-align: center;
    width: 200px;

        }

</style>

</head>
<body>

    <div class="row">

          <!--branch and date-->
          <div class="col">
            <br/>
            <br/>
            <div class="my-box2">
                <p> فرع :  فيصل 2</p>
                <p>التاريخ :  12/06/2023     00:46</p>
            </div>
        </div>
          <div class="col">
            <br/>
            <br/>
            <div class="my-box2">سركي التحويلات</div>
            <div class="day-box"> عن يوم : 11/06/2023 </div>
        </div>


        {{-- <div class="col">
            <img src="{{ asset('images/sun.png') }}" alt="Sun Image">
        </div> --}}
    </div>


    <!-- first table-->
    <div class="my-box">تحويلات اجل</div>

<table class="myTable">
<thead>
<tr>
    <th class="border-cell">رقم المريض</th>
    <th class="border-cell">اسم المريض</th>
    <th class="border-cell">تاريخ الزيارة</th>
    <th class="border-cell">اسم العميل</th>
    <th class="border-cell">درجة القرابة</th>
    <th class="border-cell" colspan="2">الطبيب المعالج</th>
    <th class="border-cell">اصل التحويل</th>
    <th class="border-cell"> كارنيه</th>
    <th class="border-cell"> موافقه</th>
    <th class="border-cell"> روشته</th>
    <th class="border-cell">اسم المستخدم</th>
</tr>
</thead>
<tbody>
    @if ($logs->isNotEmpty())
    @foreach($logs as $log)
        <tr>

        <td class="border-cell">{{ $log->id  ?? '' }}</td>
        <td class="border-cell">{{ $log->log_name  ?? ''}}</td>
        <td class="border-cell">{{ $log->created_at ?? ''}}</td>
        <td class="border-cell">{{ $log->log_name   ?? ''}} </td>
        <td class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td class="border-cell">{{ $log->id  ?? '' }}</td>
        <td class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td><input type="checkbox"></td>
        <td><input type="checkbox"></td>
        <td><input type="checkbox"></td>
        <td><input type="checkbox"></td>
        <td class="border-cell">{{ $log->log_name   ?? ''}}</td>

        </tr>

        @endforeach
@else
<h3> no result</h3>
    @endif


</tbody>
</table>

{{-- <div class="centered-box">
<div class="dynamic-text-box">299</div>

<div class="additional-text">: عدد التحويلات الاجل</div>
</div> --}}

{{-- <div class="my-bordered-box">
    عدد التحويلات: {{ 299 }}
</div> --}}

<div style="align-items: center; display:block; text-align:center">
    عدد التحويلات :
    <span class="my-bordered-box">299</span>
</div>






<!-- <div class="small-title-container">
<div class="title-box">
  <h2>تحويلات نقدي</h2>
</div>
</div> -->


<div class="my-box">تحويلات نقدي</div>


<table class="myTable">
<thead>
  <tr>
      <th class="border-cell">رقم المريض</th>
      <th class="border-cell">اسم المريض</th>
      <th class="border-cell">تاريخ الزيارة</th>
      <th class="border-cell">اسم العميل</th>
      <th class="border-cell">درجة القرابة</th>
      <th class="border-cell" colspan="2">الطبيب المعالج</th>

      <th class="border-cell"> كارنيه</th>

      <th class="border-cell"> روشته</th>
      <th class="border-cell">اسم المستخدم</th>
  </tr>
</thead>
<tbody>

    <tr>
        <td class="border-cell">1234567890133</td>
        <td class="border-cell">مريض 1</td>
        <td class="border-cell">2024-03-28</td>
        <td class="border-cell">عميل1</td>
        <td class="border-cell">123456</td>
        <td class="border-cell">123</td> <!-- Doctor ID -->
        <td class="border-cell">دكتور....  </td> <!-- Doctor Name -->
        <td><input type="checkbox"></td>
        <td><input type="checkbox"></td>
        <td class="border-cell">مستخدم</td>

    </tr>


</tbody>
</table>



<div style="align-items: center; display:block; text-align:center">
    عدد التحويلات النقدي :
    <span class="my-bordered-box">299</span>
</div>

{{-- <div class="centered-box row">
    <div class="dynamic-text-box">299</div>

    <div class="additional-text">: عدد التحويلات النقدي</div>
</div> --}}



</body>
