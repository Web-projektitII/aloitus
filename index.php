<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Web-ohjelmointikurssin aloitus</title>
<meta name="description" content="Web-ohjelmointikurssin HTML-aloitus.">
<meta name="author" content="Web-ohjelmoija">
<meta property="og:title" content="Web-ohjelmointikurssin aloitus">
<meta property="og:type" content="web-sivu">
<!--<meta property="og:url" content="http://127.0.0.1/aloitus/aloitus.html">-->
<meta property="og:description" content="HTML-malli.">
<!--<meta property="og:image" content="image.png">-->
<!--<link rel="stylesheet" href="site.css">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<link rel="stylesheet" href="navbar.css">
<!--<script src="scripts.js"></script>-->
<style>
div {font-family:Arial;}
.perusta {
    font-weight:normal;
    background-color:orange;
    border: 1px solid blue;
    }
.container {
    /*width:100%;*/
}    
.laatikko_normal {
    display:inline-block;
    background-color:orange;
    border: 1px solid blue;
    width:100%;
    height:100px;
    } 
.container_flex {
    display:flex;
    flex-direction: row;
    flex-wrap: wrap;
    /*justify-content:flex-start;*/
    /*align-content:space-between;*/
    row-gap:4px;
    column-gap:4px;
}
.laatikko_flex{
    background-color: yellow;
    border: 1px solid blue;
    width:100%;
    height:100px;
    }  
.container_grid {
    margin-top:4px;
    display:grid;
    grid-template-columns: repeat(1,100%);
    grid-template-rows: repeat(4,100px);
    row-gap:4px;
    column-gap:4px;
}
.laatikko_grid{
    background-color: yellowgreen;
    border: 1px solid blue;
    }     
.container_minmax {
    margin-top:4px;
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    row-gap:4px;
    column-gap:4px;
}
.laatikko_minmax{
    background-color: green;
    border: 1px solid blue;
    height:100px;
    }   
    

@media (min-width: 576px) {
.laatikko_normal,.laatikko_flex {width:calc(50% - 5px);}
.container_grid{
    grid-template-columns: repeat(2,1fr);
    grid-template-rows: repeat(2,100px);
    }
}

@media (min-width: 768px) {
.laatikko_normal,.laatikko_flex {width:calc(100%/3 - 5px);}
.container_grid{
    grid-template-columns: repeat(3,1fr);
    }
}

@media (min-width: 992px) {

}

@media (min-width: 1200px) {

}

</style>
<script>
function napsautus(){
    alert("Hello!");
}
</script>
</head>
<body>
<div id="root">

<header>
    <div class="brand-logo">
    <a href="#"><img src="omnia_logo.png" alt="Brand Logo"></a>
    </div>

    <input type="checkbox" id="toggle-btn">
    <label for="toggle-btn" class="show-menu-btn"><i class="fas fa-bars"></i></label>

    <nav>
    <ul class="navigation">
        <li><a href="bootstrap_sivu.html"><i class="fas fa-house-damage"></i> Bootstrap_versio</a></li>
        <li><a href="#"><i class="far fa-image"></i> Gallery</a></li>
        <li><a href="#"><i class="fab fa-blogger-b"></i> Blog</a></li>
        <li><a href="#"><i class="fas fa-question"></i> Support</a></li>
        <li><a href="#"><i class="fas fa-phone-alt"></i> Contact Us</a></li>
        <label for="toggle-btn" class="hide-menu-btn"><i class="fas fa-times"></i></label>
    </ul>
    </nav>
</header>

<p class="perusta" onclick="napsautus();" style="color:blue">Hello world!</p>
<p>Normaali</p>
<div class="container_normal">
    <div class="laatikko_normal"></div>
    <div class="laatikko_normal"></div>
    <div class="laatikko_normal"></div>
    <div class="laatikko_normal"></div>
</div>
<p>Flexbox</p>
<div class="container_flex">
    <div class="laatikko_flex"></div>
    <div class="laatikko_flex"></div>
    <div class="laatikko_flex"></div>
    <div class="laatikko_flex"></div>
</div>
<p>Grid</p>
<div class="container_grid">
    <div class="laatikko_grid"></div>
    <div class="laatikko_grid"></div>
    <div class="laatikko_grid"></div>
    <div class="laatikko_grid"></div>
</div>
<p>Grid, minmax(250px,1fr)</p>
<div class="container_minmax">
    <div class="laatikko_minmax"></div>
    <div class="laatikko_minmax"></div>
    <div class="laatikko_minmax"></div>
    <div class="laatikko_minmax"></div>
</div>
</div>
</body>
</html>