<style>
@import "bourbon";
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600);

body{
  font-family: "Lato";
  font-size: 100%; 
	overflow-y: scroll; 
 font-family: sans-serif; 
 -ms-text-size-adjust: 100%; 
 -webkit-text-size-adjust: 100%; 
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; 
  text-rendering: optimizeLegibility;
  background-color: #fefefe;
}
a{
  text-decoration: none;
  @include transition(all 0.6s ease);
  
  &:hover{
     @include transition(all 0.6s ease);
  }
}

.app{
  height: 100vh;
}
/* -------------
Sidebar
----------------*/
.sidebar {
  position: absolute;
  //width: 33.3333%;
  width: 17em;
  height: 100%;
  top: 0;
  overflow:hidden;
  background-color: #19222a;
  -webkit-transform: translateZ(0);
  visibility: visible;
  -webkit-backface-visibility: hidden;
  
  header{
    background-color: #09f;
    width: 100%;
    display:block;
    padding: 0.75em	1em;
  }
}

/* -------------
Sidebar Nav
----------------*/
.sidebar-nav {
  position: fixed;
  //width: 13em;
  background-color: #19222a;
  height: 100%;
  font-weight: 400; 
  font-size: 1.2em;
  overflow: auto;
  padding-bottom: 6em;
  z-index: 9;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
 
  
  ul{
    list-style:none;
    display: block;
    padding: 0;
    margin: 0;
    
    li{
      margin-left: 0;
      padding-left: 0;
      //min-width: 13em;
      display:inline-block;
      width: 100%;
      
      a{
        color: rgba(255,255,255,0.9);
        font-size: 0.75em;
        padding: 1.05em	1em;
        position: relative;
        display:block;
        
        &:hover{
          background-color: rgba(0,0,0,0.9);
          @include transition(all 0.6s ease);
        }
      }
/* -------------
Sidebar: icons
----------------*/
      i{
        font-size: 1.8em;
        padding-right: 0.5em;
        width: 9em;
        display: inline;
        vertical-align:middle;
      }  
    }
  }

/* -------------
Chev elements
----------------*/ 
  & > ul > li > a:after {
    content: '\f125';
    font-family: ionicons;
    font-size: 0.5em;
    width: 10px;
    color: #fff;
    position: absolute;
    right: 0.75em;
    top: 45%;
  }
/* -------------
Nav-Flyout
----------------*/
  & .nav-flyout {
    position: absolute;
    background-color: #080D11;
    z-index: 9;
    left: 2.5em;
    top: 0;
    height: 100vh;
    @include transform(translateX(100%));
    @include transition(all 0.5s ease);
    
    a:hover{
      background-color: rgba(255,255,255, 0.05)
    }
  }

/* -------------
Hover
----------------*/
  & ul > li:hover{
      .nav-flyout{
      @include transform(translateX(0));
        @include transition(all 0.5s ease);
    }
  }
}
</style>
<section class="app">
  <aside class="sidebar">
         <header>
        Menu
      </header>
    <nav class="sidebar-nav">
 
      <ul>
        <li>
          <a href="#"><i class="ion-bag"></i> <span>Shop</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-color-filter-outline"></i>Derps</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-clock-outline"></i>Times</a>
            </li>
            <li>
              <a href="#"><i class="ion-android-star-outline"></i>Hates</a>
            </li>
            <li>
              <a href="#"><i class="ion-heart-broken"></i>Beat</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-settings"></i> <span class="">Controls</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-alarm-outline"></i>Watch</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-camera-outline"></i>Creeper</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-chatboxes-outline"></i>Hate</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-cog-outline"></i>Grinder</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-briefcase-outline"></i> <span class="">Folio</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-flame-outline"></i>Burn</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-lightbulb-outline"></i>Bulbs</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-location-outline"></i>Where You</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-locked-outline"></i>On Lock</a>
            </li>
             <li>
              <a href="#"><i class="ion-ios-navigate-outline"></i>Ghostface</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-analytics-outline"></i> <span class="">Graphicals</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-timer-outline"></i>Timers</a>
            </li>
            <li>
              <a href="#"><i class="ion-arrow-graph-down-left"></i>You Lose</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-partlysunny-outline"></i>Stormy</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-timer-outline"></i>Lookie Look</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-game-controller-a-outline"></i>Dork Mfer</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-paper-outline"></i> <span class="">Papers</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-filing-outline"></i>File Cab</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-information-outline"></i>Infos</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-paperplane-outline"></i>Planes</a>
            </li>
            <li>
              <a href="#"><i class="ion-android-star-outline"></i>Shop</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-navigate-outline"></i> <span class="">Ass Finder</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-flame-outline"></i>Burn</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-lightbulb-outline"></i>Bulbs</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-location-outline"></i>Where You</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-locked-outline"></i>On Lock</a>
            </li>
             <li>
              <a href="#"><i class="ion-ios-navigate-outline"></i>Ghostface</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-medical-outline"></i> <span class="">Cocaine</span></a>
        </li>
      </ul>
    </nav>
  </aside>
</section>