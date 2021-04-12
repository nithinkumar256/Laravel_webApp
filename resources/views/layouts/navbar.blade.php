<style>
    .sidenav {
      height: 100%; /* Full-height: remove this if you want "auto" height */
      width: 200px; /* Set the width of the sidebar */
      position: fixed; /* Fixed Sidebar (stay in place on scroll) */
      z-index: 1; /* Stay on top */
      top: 0; /* Stay at the top */
      left: 0;
      background-color: #111; /* Black */
      overflow-x: auto; /* Disable horizontal scroll */
      padding-top: 20px;
    }
    
    /* The navigation menu links */
    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }
    
    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
      color: #f1f1f1;
    }
    
    /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    </style>
    <!-- Side navigation -->
    <div class="sidenav">
        <a href="/home">Home </a>
	    <a href="/addnotes">Take Notes</a>
	    <a href="/viewnotes">View Notes</a>    
	    <a href="/home/uploadfiles">Upload Files</a>
	    <a href="/home/uploadednotes">Download Files</a>
	   
    </div>