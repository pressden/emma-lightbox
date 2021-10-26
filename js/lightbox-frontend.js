( function() {
  const defaultLightGallerySettings = {
    licenseKey: 'DD622256-1B89401A-8FC0F735-98E8EA6F',
    selector: 'figure a',
    download: false,
    plugins: [lgThumbnail],
    thumbnail: true,
    zoomFromOrigin: false,
  };

  if( typeof window.lightGallerySettings === 'undefined' ) {
    var lightGallerySettings = defaultLightGallerySettings;
  } else {
    var lightGallerySettings = window.lightGallerySettings;
  }

  document.querySelectorAll( ".lightgallery" ).forEach( gallery => {
    gallery.querySelectorAll( 'figure a' ).forEach( anchor => {
      var img = anchor.querySelector( 'img' );
      if( anchor.href == img.src ) {
        var srcset = img.srcset;
        var sizes = img.sizes;
        anchor.dataset.srcset = srcset;
        anchor.dataset.sizes = sizes;
      }
      if( anchor.classList.contains( 'lightgallery-iframe' ) || anchor.closest( '.lightgallery-iframe' ) !== null ) {
        anchor.dataset.iframe = 'true';
      }
    } );
    lightGallery( gallery, lightGallerySettings );
  } );
} )();
