{{--
 <!DOCTYPE html>
 <html>
 <head>

<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Report Table</title>
 <style>

     body{
/* font-family: "'Cairo', sans-serif"; */
font-family: 'Amiri', sans-serif;

     }
     .myTable{
         padding: 10px;
         border-collapse: separate;
         border-spacing: 10px; /* Adjust spacing between cells */
         width: 100%;
         direction: rtl;
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
     margin: 10px auto;
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
     margin: 10px auto;
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
     margin: 10px auto;
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
 </style>

 </head>
 <body>
    <div class="row">

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
    <div class="col">
        <img src="{{ asset('images/sun.png') }}" alt="Sun Image">
    </div>
    </div>
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
        <td  class="border-cell"> {{ $log->id  ?? '' }} </td>
        <td  class="border-cell"> {{ $log->log_name  ?? ''}} </td>
        <td  class="border-cell">{{ $log->created_at ?? ''}}</td>
        <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td  class="border-cell">{{ $log->id   ?? '' }}</td>
        <td  class="border-cell">{{ $log->id  ?? '' }}</td>
        <td  class="border-cell">{{ $log->log_name ?? ''}}</td>
        <td  class="border-cell">{{ $log->description ?? ''}}</td>
        <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
        <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>

     </tr>
@endforeach
@else
<h3> no result</h3>
    @endif
 </tbody>
 </table>
 <div class="centered-box">
    <div class="dynamic-text-box">299</div>
    <div class="additional-text">: عدد التحويلات الاجل</div>
    </div>
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
           @if ($logs->isNotEmpty())
           @foreach($logs as $log)
           <tr>
               <td  class="border-cell"> {{ $log->id  ?? '' }} </td>
               <td  class="border-cell"> {{ $log->log_name  ?? ''}} </td>
               <td  class="border-cell">{{ $log->created_at ?? ''}}</td>
               <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
               <td  class="border-cell">{{ $log->id   ?? '' }}</td>
               <td  class="border-cell">{{ $log->id  ?? '' }}</td>
               <td  class="border-cell">{{ $log->log_name ?? ''}}</td>
               <td  class="border-cell">{{ $log->description ?? ''}}</td>
               <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
               <td  class="border-cell">{{ $log->log_name   ?? ''}}</td>
            </tr>
       @endforeach
       @else
       <h3> no result</h3>
           @endif
        </tbody>
        </table>
 </body>
 </html> --}}


 <!DOCTYPE html>
<html>
	<head>
		<title>Parkstraße</title>
		<style>
			@page {
				footer: page-footer;
				margin: 0;
				margin-top: 35pt;
				margin-bottom: 50pt;
				margin-footer: 18pt;
			}

			@page :first {
				margin-top: 0;
			}

			body {
				margin: 0;
				font-family: sans-serif;
				font-size: 12pt;
			}

			table, tr, td {
				padding: 0;
				border-collapse: collapse;
			}
			table { width: 100%; }
			td { vertical-align: top; }

			.page-break-before { page-break-before: always; }

			.container { padding: 0 35pt; }

			main .container {
				margin-top: 2em;
			}
			main h2 {
				margin: 0 0 .8em;
				page-break-after: avoid;
			}
			main p, main .table-wrapper {
				margin: 0 0 1em;
			}

			.clearfix {
				clear: both;
			}

			.text-center { text-align: center; }

			.vertical-bar {
				display: block;
				width: 100px;
				border-bottom: 1px solid #ccc;
				margin: 0 auto;
			}

			.col1  { width: 8.33333%; }
			.col2  { width: 16.66667%; }
			.col3  { width: 25%; }
			.col4  { width: 33.33333%; }
			.col5  { width: 41.66667%; }
			.col6  { width: 50%; }
			.col7  { width: 58.33333%; }
			.col8  { width: 66.66667%; }
			.col9  { width: 75%; }
			.col10 { width: 83.33333%; }
			.col11 { width: 91.66667%; }
			.col12 { width: 100%; }

			#header {
				border: none;
				padding: 30pt 0;
				background-color: #3456D8;
			}

			#header table {
				color: #FFFFFF;
			}

			.grid-images {
				margin: -1%;
			}

			.tile-image {
				float: left;
				padding: 1%;
			}

			.tile-image img {
				display: block;
				width: 100%;
			}

			.details-column-table {
				margin: 0 15pt;
				table-layout: fixed;
			}

			.details-column-table tr {
				border: none;
				border-bottom: .5pt solid #ddd;
			}

			.details-column-table tr:last-child {
				border: none;
			}

			.details-column-table td {
				line-height: 30pt;
			}

			.details-column-table .label {
				font-weight: bold;
			}

			.details-column-table .value {
				text-align: right;
				white-space: nowrap;
				font-weight: normal;
			}

			.tag {
				float: left;
				width: auto;
				margin: 0 .5em .5em;
				padding: .3em .5em;
				background-color: #eee;
				border-radius: 3px;
				text-align: center;
			}

			.contact-box {
				width: 350pt;
				margin: 35pt auto;
				padding: 30pt;
				border-radius: 2pt;
				border: 1pt solid rgba(0, 0, 0, .1);
				border-bottom-width: 3pt;
				page-break-inside: avoid;
			}

			.contact-image {
				margin: 0 auto;
				width: 30%;
				padding-bottom: 30%;
				border-radius: 50%;
				background-size: 100% auto;
				background-position: center;
				background-image: url(https://dummyimage.com/150x150);
			}

			.contact-details {
				margin: 0 auto;
				width: 70%;
				text-align: center;
			}

			.contact-name {
				margin-top: 18pt;
				margin-bottom: 0;
				font-size: 1.5em;
			}

			.contact-email {
				color: #aaa;
			}

			.contact-phone {
				margin-top: 15pt;
			}
		</style>
	</head>
	<body>
		<header id="header">
			<div class="container">
				<div class="table-wrapper">
					<table>
						<tr>
							<td class="col9">
								<h1 style="font-size: 1.6em; margin-bottom: 10pt;">Parkstraße</h1>
								<div style="margin-top: 30pt;">
									Test
								</div>
							</td>
							<td class="col3" style="text-align: right; vertical-align: middle;"><img alt="Test Team" src="https://dummyimage.com/600x400/3456D8" style="height: 70px;"></td>
						</tr>
					</table>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="grid-images">
					<div class="tile-image" style="width: 98%;"><img src="https://dummyimage.com/400x200"></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="container">
				<h2>Details</h2>
				<table style="margin: 0 -15pt;">
					<tr>
						<td class="col6">
							<table class="details-column-table">
								<tr>
									<td class="label">Typ:</td>
									<td class="value">Wohnung zur Miete</td>
								</tr>
							</table>
						</td>
						<td class="col6">
							<table class="details-column-table">
								<tr>
									<td class="label">Nummer:</td>
									<td class="value">#5865</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="container">
				<div class="tags">
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="page-break-before"></div>
			<div class="container">
				<div class="contact-box">
					<div class="contact-image"></div>
					<div class="contact-details">
						<h3 class="contact-name">Niklas</h3>
						<div class="contact-email">
							test@gmail.com
						</div>
						<div class="contact-phone">
							1234
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
