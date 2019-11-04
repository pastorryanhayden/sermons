<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ChurchTools Sermons - A Free Sermon Library For Your Church</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Font Awesome if you need it
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  -->
{{--   <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"> --}}
  <link rel="stylesheet" href="/css/app.css">
  <!--Replace with your tailwind.css once created-->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, RGB(37, 117, 255) 0%, RGB(53, 220, 138) 100%);
        }
    </style>

</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white">

    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            
        <div class="pl-4 flex items-center">
            <a class="toggleColour text-white no-underline hover:no-underline font-semibold text-2xl lg:text-3xl flex items-center"  href="/"> 
            
        <svg viewBox="0 0 202 182" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" class="h-8 lg:h-10 inline mr-1">
          <g fill="#fff" fill-rule="nonzero">
            <path d="M123.72 108h-20.4V83.4c0-1.9-1.5-3.5-3.5-3.5-1.9 0-3.5 1.5-3.5 3.5V108h-20.4c-1.9 0-3.5 1.5-3.5 3.5 0 1.9 1.5 3.5 3.5 3.5h20.4v62.8c0 1.9 1.5 3.5 3.5 3.5 1.9 0 3.5-1.5 3.5-3.5V115h20.4c1.9 0 3.5-1.5 3.5-3.5s-1.6-3.5-3.5-3.5z"/>
            <path d="M200.42 99c-.7-.7-1.6-1.1-2.5-1.1h-25.6l2.9-36.6a3.4 3.4 0 00-3.4-3.7h-68.4V21.9a11.2 11.2 0 10-14.5-10.7c0 4.9 3.2 9.2 7.7 10.6v35.8h-68.4c-1 0-1.9.4-2.5 1.1-.7.7-1 1.7-.9 2.6l2.9 36.6H3.42c-1 0-1.9.4-2.5 1.1-.7.7-1 1.7-.9 2.6l5.8 76.3c.1 1.8 1.7 3.2 3.4 3.2h.3c1.9-.1 3.3-1.8 3.2-3.7l-5.6-72.6h21.1l5.8 73.1c.2 1.9 1.8 3.3 3.7 3.2 1.9-.2 3.3-1.8 3.2-3.7l-8.9-112.9h136.3l-9.3 112.9a3.4 3.4 0 003.2 3.7h.3c1.8 0 3.3-1.4 3.4-3.2l5.8-73.1h22.4l-5.6 72.6c-.1 1.9 1.3 3.6 3.2 3.7h.3c1.8 0 3.3-1.4 3.4-3.2l5.8-76.3c.1-.9-.2-1.9-.8-2.6zM99.82 6.8c2.4 0 4.3 1.9 4.3 4.3s-1.9 4.3-4.3 4.3-4.3-1.9-4.3-4.3 2-4.3 4.3-4.3z"/>
  </g>
    </svg>
 Sermons by Church Tools
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-orange-800 hover:text-gray-900">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="/login">Log In</a>
                </li>
            </ul>
            <a id="navAction" href="{{ route('register') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">Sign Up</a>
        </div>
    </div>
    
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>




<!--Hero-->
<div class="pt-24">

    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">ChurchTools.co</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">The easiest way to get your church's sermons online!</h1>
            <p class="leading-normal text-2xl mb-8">Incredibly Powerful. Completely Free.</p>
        
            

            <a href="{{ route('register') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg z-40">Sign Up</a>
            
        </div>
        <!--Right Col-->
        <div class="hidden md:flex w-full md:w-3/5 py-6 text-center  justify-center">
           <a href="#video">
            <img class="z-50" src="/images/play.svg">
            </a>
        </div>
        
    </div>

</div>

<!-- Hero Border Effect -->
<div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
    <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
    </g>
    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
    <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
    </g>
    </g>
    </svg>

</div>

<section id="video" class="video bg-white py-8 flex items-center justify-center">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ugUz0V3Ze0M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>


<section class="bg-white border-b py-8">
    <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-4xl font-bold leading-tight text-center text-gray-800">A Platform For Sharing Your Sermons</h1>
        <div class="w-full mb-4">   
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
    
        <div class="flex flex-wrap">
            <div class="w-5/6 sm:w-1/2 p-6">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">Turn your preaching into a lasting resource.</h3>
                <p class="text-gray-600 mb-8">You study every week for hours to deliver the word of God.  Now you can easily share the results of that study with the people visiting your website and create a lasting Bible study resource that grows with your ministry.  People will be able to search through your sermons, browse your sermon series, and even (if you want to) download your manuscripts.</p>
                
            </div>
            <div class="w-full sm:w-1/2 p-6">
                <img src="/images/sermons-image.jpg" alt="" class="rounded-full h-64 w-64 object-cover mx-auto">
            </div>
        </div>
        
        
        <div class="flex flex-wrap flex-col-reverse sm:flex-row">   
            <div class="w-full sm:w-1/2 p-6 mt-6">
                  <img src="/images/free.jpg" alt="" class="rounded-full h-64 w-64 object-cover mx-auto">
            </div>
            <div class="w-full sm:w-1/2 p-6 mt-6">
                <div class="align-middle">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">Completely Free - no up-sells, no limits</h3>
                    <p class="text-gray-600 mb-8">This tool is completely free for your church.  I want you to reach as many people with the gospel as possible and designed this tool to that end, not to make money. If you want to help or be a blessing, I provide a donation link, but feel free to ignore that.</p>
                </div>
            </div>

        </div>
          <div class="flex flex-wrap">
            <div class="w-5/6 sm:w-1/2 p-6 mt-6">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">Made by a pastor - for pastors.</h3>
                <p class="text-gray-600 mb-8">My name is Ryan Hayden and I'm the guy who made this software.  For 8 years I've been blessed to be the pastor at <a class="underline" href="https://biblebaptistmattoon.org" target="blank">Bible Baptist Church in Mattoon, IL</a>.  Since I started preaching, I admired the features on websites like gty.org and desiringgod.org and I wanted to make it so any church could have those features.  <a class="underline" href="https://sermons.churchtools.co/churches/1/normal">You can view my sermon library here.</a></p>
            </div>
            <div class="w-full sm:w-1/2 p-6 mt-6">
                <img src="/images/ryan-hayden.png" alt="" class="rounded-full h-64 w-64 object-cover mx-auto">
            </div>
        </div>
    </div>
</section>
        
        
        

<section class="bg-white  py-8">
    
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
    
        <h1 class="w-full my-2 text-4xl font-bold leading-tight text-center text-gray-800">Features</h1>
        <div class="w-full mb-4">   
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
    
        <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Works with your current website</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Either link to it in your main menu or drop it in as an embed. 
                    </p>
                </div>
            </div>
           
        </article>
        <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Latest Sermon Widget</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Show your last sermon on your home page.  (Or anywhere) 
                    </p>
                </div>
            </div>
           
        </article>
         <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Current Series Widget</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                      Show your current series on your home page.  (Or anywhere) 
                    </p>
                </div>
            </div>
           
        </article>
         <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Speaker Pages</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                      See all the speakers at your church and easily find all of their sermons. 
                    </p>
                </div>
            </div>
           
        </article>
        <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Series Pages</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                      Pages to promote and organize a sermon series. 
                    </p>
                </div>
            </div>
           
        </article>
        <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Video Integration</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                      Drop in a URL from Youtube or Vimeo and display your sermon video on your page. 
                    </p>
                </div>
            </div>
           
        </article>
                <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Podcast Feed</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                      We automatically create a podcast feed you can share with iTunes and other providers. 
                    </p>
                </div>
            </div>
           
        </article>
           <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Notes, Slides, Manuscript</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                   Optionally upload sermon notes (PDF or DOC), slides (PDF or PPT), or even your sermon manuscript. 
                    </p>
                </div>
            </div>
           
        </article>
        <article class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div href="#" class="flex flex-wrap no-underline hover:no-underline pt-6">
                    <div class="w-full font-bold text-xl text-gray-800 px-6">Sortable by Text, Series, Speaker and Date</div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                  Crazy powerful sorting features help users find your sermons fast.</p>
                </div>
            </div>
           
        </article>
        
        
        
        
    </div>

</section>





<!-- Change the colour #f8fafc to match the previous section colour -->
<svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#ffffff">
                <path d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                </g>
            </g>
        </g>
    </g>
</svg>

<section class="container mx-auto text-center py-6 mb-12">

    <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">Sign Up For Free</h1>
    <div class="w-full mb-4">   
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
    </div>

    <h3 class="my-4 text-3xl leading-tight">Start your free sermon library today</h3>    

    <a href="/register" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg">Sign Up</a>
        
</section>






  <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->

<script>

    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener('scroll', function() {

    /*Apply classes for slide in bar*/
    scrollpos = window.scrollY;

    if(scrollpos > 10){
      header.classList.add("bg-white");
      navaction.classList.remove("bg-white");
      navaction.classList.add("gradient");
      navaction.classList.remove("text-gray-800");
      navaction.classList.add("text-white");
      //Use to switch toggleColour colours
      for (var i = 0; i < toToggle.length; i++) {
         toToggle[i].classList.add("text-gray-800");
         toToggle[i].classList.remove("text-white");
      }
      header.classList.add("shadow");
      navcontent.classList.remove("bg-gray-100");
      navcontent.classList.add("bg-white");
    }
    else {
      header.classList.remove("bg-white");
      navaction.classList.remove("gradient");
      navaction.classList.add("bg-white");
      navaction.classList.remove("text-white");
      navaction.classList.add("text-gray-800");
      //Use to switch toggleColour colours
      for (var i = 0; i < toToggle.length; i++) {
         toToggle[i].classList.add("text-white");
         toToggle[i].classList.remove("text-gray-800");
      }
      
      header.classList.remove("shadow");
      navcontent.classList.remove("bg-white");
      navcontent.classList.add("bg-gray-100");
      
    }

    });

    
</script>

<script>
    
    
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
    
    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");
    
    document.onclick = check;
    function check(e){
      var target = (e && e.target) || (event && event.srcElement);
      
      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {navMenuDiv.classList.add("hidden");}
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
      
    }
    function checkParent(t, elm) {
      while(t.parentNode) {
        if( t == elm ) {return true;}
        t = t.parentNode;
      }
      return false;
    }
</script>


</body>

</html>
