function change_country()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax.php?country_id=" + document.getElementById("country_id").value, false);
    xmlhttp.send(null);
    document.getElementById("university_id_div").innerHTML = xmlhttp.responseText;
}

function change_university()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax.php?university_id=" + document.getElementById("university_id").value, false);
    xmlhttp.send(null);
    document.getElementById("campus_id_div").innerHTML = xmlhttp.responseText;
}

function change_agency()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax.php?agency_id=" + document.getElementById("agency_id").value, false);
    xmlhttp.send(null);
    document.getElementById("student_id_div").innerHTML = xmlhttp.responseText;
}

function change_type_f()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax.php?type_id_f=" + document.getElementById("type_id").value+ "&agency_id_f=" + document.getElementById("agency_id").value, false);
    xmlhttp.send(null);
    document.getElementById("student_id_div").innerHTML = xmlhttp.responseText;
}

function change_student_f()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax.php?student_id_f=" + document.getElementById("student_id").value, false);
    xmlhttp.send(null);
    document.getElementById("entry_div").innerHTML = xmlhttp.responseText;
}

function change_agency_f()
{
   
    document.getElementById("type_div").innerHTML =  '<label>Type</label><select class="form-control" name="type_id" id="type_id" onchange="change_type_f()" required><option value="">Select Type</option><option value="1">DEBIT</option><option value="2">CREDIT</option></select>';
}


function change_date()
{
    var xmlhttp = new XMLHttpRequest();
    var c=document.getElementById("date_id").value;
   if(c=="1")
   {
    document.getElementById("date_range").innerHTML = '<input name="daterange" id="daterange" class="form-control" /><br>';
   }
   else
   {
    document.getElementById("date_range").innerHTML="";
   }
   $(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});
}
