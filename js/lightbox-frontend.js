( function() {
  //create default settings for library
  var defaultLightGallerySettings = {
    download: false,
    plugins: [lgThumbnail],
    thumbnail: true,
    zoomFromOrigin: false,
  };

  //override default settings with any override settings in child theme
  var lightGallerySettings = {...defaultLightGallerySettings, ...window.overrideLightGallerySettings};

  document.querySelectorAll( ".lightgallery" ).forEach( gallery => {
    //construct anchor list based on whether .lightgallery item is a link or a container
    if( gallery.tagName == "A" ) {
      var anchors = [gallery];
    } else {
      var anchors = gallery.querySelectorAll( 'a' );
    }
    
    var galleryItems = [];
    //assess each link for various options
    anchors.forEach( anchor => {
      if( ! anchor.classList.contains( ".lg-ignore" ) && anchor.closest( '.lg-ignore' ) === null ) {
        var img = anchor.querySelector( 'img' );
        if( img && anchor.href == img.src ) {
          var srcset = img.srcset;
          var sizes = img.sizes;
          anchor.dataset.srcset = srcset;
          anchor.dataset.sizes = sizes;
        }
        if( anchor.classList.contains( 'lg-iframe' ) || anchor.closest( '.lg-iframe' ) !== null ) {
          anchor.dataset.iframe = 'true';
        }
        //append link to galleryItems list
        galleryItems.push( anchor );
      }
    } );

    //if galleryItems list has items, initialize gallery with settings
    if( galleryItems.length !== 0 ) {
      lightGallerySettings.selector = galleryItems;
      let initGallery = lightGallery( gallery, lightGallerySettings );

      //if gallery has an ID, tell all links to that ID to open the gallery
      if( gallery.hasAttribute( 'id' ) ) {
        document.querySelectorAll( 'a[href="#' + gallery.id + '"]' ).forEach( opener => {
          opener.addEventListener( 'click', function( event ) {
            event.preventDefault();
            initGallery.openGallery();
          } );
        } );
      }
    }
  } );
} )();
