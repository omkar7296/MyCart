<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>



</style>


<script>
function call_search(){
	if(document.getElementById("brand").checked == true){
		if(document.getElementById("search_inp").value == ""){
		alert("Enter brand");
		return false;
		}
	}
	
	document.getElementById("search_form").submit();

}	

</script>
</head>

<body>
		<div id="Header">
			<br>
			<div id="transform"><p><center><img src="logo/logo_1.png"/></center></p></div>
	<div id="firstdiv">
		<div id="mdiv1">
			<a href="Home.php?parameter=1">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		</div> 
		
		
	
