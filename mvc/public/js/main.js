// burger menu nav

document.querySelector('.burger').addEventListener('click', function(_e){
  //verhindern dass der link aufgerufen wird
  _e.preventDefault();
  
  //mainnav ul selektieren
  var mainnav = document.querySelector('.nav_points');
  
  //open classe toggeln
  mainnav.classList.toggle('nav_points--open');
  
  //svg icons selektieren und in variablen speichern
  var burger_icon = document.querySelector('.burger_icon');
  var close_icon = document.querySelector('.close_icon');
  
  //wenn das menü gerade offen ist 
  if(mainnav.classList.contains('nav_points--open')) {
    //burger ausblenden und x einblenden
    burger_icon.style.display = "none";
    close_icon.style.display = "block";
  } else {
    //burger einblenden und x ausblenden
    burger_icon.style.display = "block";
    close_icon.style.display = "none";
  }
  
});

// Back to Top Button

var backToTop = document.querySelector('.back-to-top');


//Scrolled zum Anfang der Seite
backToTop.addEventListener('click', function() {
        document.documentElement.scrollTop = 0;
});


// Home Seite - Header

// neues image fährt ins bild
var home_maintl = gsap.timeline();

var imgHomeHeader = document.querySelector('.img-home-header');
var h1Home = document.querySelector('.h1-home');
var h1HomeText = document.querySelector('.h1-home-text');

home_maintl.add("frame0")
.add("frame1", "+=.5")
.from(imgHomeHeader,1,{scaleY:0, opacity: 0, ease: Power0.easeNone})
.from(h1Home,1,{opacity: 0, ease: Power0.easeNone})
.from(h1HomeText,1,{opacity: 0, ease: Power0.easeNone})

// .fromTo(imgHomeHeader,2.5,{x:"-=1800px"},{autoAlpha:1, x:"0", ease: Power2.easeOut})





// Hover über Produktbilder - Bilder werden vergrößert

  var imgThumbnail = document.querySelectorAll('.img-thumbnail');

  for (var i = 0; i < imgThumbnail.length; i++) {

      // jeder card mouseenter hinzufügen
      imgThumbnail[i].addEventListener('mouseenter', function (_e) {

          var current_img = _e.target;

          gsap.to(current_img, {
              scale: 1.05, 
              ease: "power1.inOut",
          });

      });

      imgThumbnail[i].addEventListener('mouseleave', function (_e) {

          var current_img = _e.target;
      
          gsap.to(current_img, {
              scale: 1, 
              ease: "power1.inOut",
          });

      });

  };


// Funktionen für Create your own Bike


// 1) Eventlistener für die einzelnen Configurationen

var btn_transform = document.querySelector('.btn-transform');

var saddle_selected = document.getElementsByName('saddle');
var frame_selected = document.getElementsByName('frame');
var tire_selected = document.getElementsByName('tire');


// Sattel Config

for (i = 0; i < saddle_selected.length; i++) {

  saddle_selected[i].addEventListener('click', function(_e) {
    // klasse wegnehmen damit nicht alles selektiert wirkt
    var parentDiv= _e.target.parentNode.parentNode;

    var allLabels = parentDiv.querySelectorAll('label');


    for (i =0; i < allLabels.length; i++ ) {
      allLabels[i].classList.remove('selected_config');
    }

    var current_selected = _e.target.parentNode;


    // klasse hinzufügen bei label und image
    
    var current_label = current_selected.querySelector('label');

    current_label.classList.add('selected_config');

    var current_img = current_selected.querySelector('img');
    current_img.classList.add('selected_config_img');

  });

}


// Frame Config

for (i = 0; i < frame_selected.length; i++) {

  frame_selected[i].addEventListener('click', function(_e) {
    // klasse wegnehmen damit nicht alles selektiert wirkt
    var parentDiv= _e.target.parentNode.parentNode;

    var allLabels = parentDiv.querySelectorAll('label');


    for (i =0; i < allLabels.length; i++ ) {
      allLabels[i].classList.remove('selected_config');
    }

    var current_selected = _e.target.parentNode;


    // klasse hinzufügen bei label und image
    
    var current_label = current_selected.querySelector('label');

    current_label.classList.add('selected_config');

    var current_img = current_selected.querySelector('img');
    current_img.classList.add('selected_config_img');

  });

}

// Tire Config

for (i = 0; i < tire_selected.length; i++) {

  tire_selected[i].addEventListener('click', function(_e) {
    // klasse wegnehmen damit nicht alles selektiert wirkt
    var parentDiv= _e.target.parentNode.parentNode;

    var allLabels = parentDiv.querySelectorAll('label');


    for (i =0; i < allLabels.length; i++ ) {
      allLabels[i].classList.remove('selected_config');
    }

    var current_selected = _e.target.parentNode;


    // klasse hinzufügen bei label und image
    
    var current_label = current_selected.querySelector('label');

    current_label.classList.add('selected_config');

    var current_img = current_selected.querySelector('img');
    current_img.classList.add('selected_config_img');

  });

}

// 2) Transform Bike 

btn_transform.addEventListener('click', function(_e) {
  
  _e.preventDefault();
  
  // aktuell selektierte farbe für den Sattel rausfinden:
  
  var saddle_selected = document.getElementsByName('saddle');
  
  var current_saddle = '';
  
  for(i = 0; i < saddle_selected.length; i++) { 
    
    if(saddle_selected[i].checked) {
      current_saddle = saddle_selected[i].value; 
    }
    
  } 
  
  console.log(current_saddle);
  
  
  // aktuell selektierte farbe für den Frame rausfinden:
  
  var frame_selected = document.getElementsByName('frame');
  console.log(frame_selected);
  
  var current_frame = '';
  
  for(i = 0; i < frame_selected.length; i++) { 
    
    if(frame_selected[i].checked) {
      current_frame = frame_selected[i].value; 
    }
  } 
  
  console.log(current_frame);
  
  
  // aktuell selektierte farbe für das Rad rausfinden:
  
  var tire_selected = document.getElementsByName('tire');

  console.log(tire_selected);
  
  var current_tire = '';
  
  for(i = 0; i < tire_selected.length; i++) { 
    
    if(tire_selected[i].checked) {
      current_tire = tire_selected[i].value; 
    }

    // console.log(current_tire);
  } 
  
  console.log(current_tire);

  var image = document.querySelector('.img-supersonic');
  // console.log(image);
  
  // var image_src erstellen
  var image_current_src = '';
  
  // von image die src ausgeben und in var image_src speichern
  var image_current_src = image.getAttribute('src');
  
  // den String von image src splitten und in ein array umwandeln
  
  var image_src_array = image_current_src.split("_");
  
  image_src_array[1] = current_saddle;
  image_src_array[2] = current_frame;
  image_src_array[3] = current_tire;
  
  // array in string umwandeln und in src speichern damit richtiges bild geladen wird
  
  var image_new_src = image_src_array.join('_');
  // console.log(array_to_string);
  
  image_src = image_new_src;
  
  image.setAttribute('src', image_new_src);
  
  
  console.log(image_src);
  
  
  //Scrolled zum Anfang der Seite

  document.documentElement.scrollTop = 0;


  // neues image fährt ins bild
    var maintl = gsap.timeline();

    var imgNewBike = document.querySelector('.img-supersonic');

    maintl.add("frame0")
    .fromTo(imgNewBike,2.5,{x:"-=1800px"},{autoAlpha:1, x:"0", ease: Power2.easeOut})

});

// } 


