<style type="text/css">
	#sidebar { 
	   position: fixed;
	   width: 250px;
	   height: 100%;
	   background-color: #ccc;
	   left: -250px;
	   z-index: 1;
	   transition: all 100ms linear
	}
	#sidebar ul li {
		display: block;
		list-style: none;
		padding: 15px 0;
		border-bottom: 1px solid #069;
	}
	#sidebar ul li a{ 
		color: white;
		text-decoration: none;
	}

	#sidebar.ativo {
		left: 0px;
	}

	#sidebar.sidebar-btn { 
		position: absolute; 
		cursor: pointer;
		z-index: 1 
	}
	.sidebar-btn span {
		width: 30px;
		height: 5px;
		background-color: #069;
		display: block;
		margin: 3px 0;
	}

</style>
<div class="sidebar-btn" onclick="toggle()">
	<span></span>
	<span></span>
	<span></span>
</div>
<div id="sidebar" class="">
<span>Artigos</span>
	<ul>
		<li>
			<a href="" data-toggle="modal" data-target="#exampleModal">Cadastro</a>
		</li>
	</ul>
</div>
<script type="text/javascript">
	function toggle(){
	  document.getElementById('sidebar').classList.toggle('ativo');
	}

</script>