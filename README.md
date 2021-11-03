# emma-lightbox

This plugin adds lightbox functionality to the Gutenberg in WordPress via the [lightGallery](https://www.lightgalleryjs.com/) javascript library.

## Setup
* clone (or add as a submodule) this repo into `wp-content/plugins/`
* activate plugin in WordPress

## Licensing
`lightGallery` is a licensed product. Please support the developer by purchasing a license [here](https://www.lightgalleryjs.com/license/). Check the [Advanced Options](#advanced-options) section for how to apply the license key.

## Use
`emma-lightbox` is usable out-of-the-box with a series of default settings for `lightGallery`, some of which are cusotmizable (more on this later).

For default functionality, simply add the class `lightgallery` to any link or container in Gutenberg. All links within the container (or the link the class is applied to directly) will open their content in a lightbox. If there are multiple links in the container, left/right controls will appear, along with thumbnails.

### Basic Options
* This plugin is setup to use `srcset` for responsive images. If a gallery is created on the page, and the image source of each image matches the hyperlink that contains that image, `emma-lightbox` will automatically retrieve the `srcset` data from each `img` tag and apply it to the linked image that appears in the lightbox.
* If you wish a particular link or series of links to open within an iFrame, you can add the class `lg-iframe`. Adding `lg-iframe` to a container will apply the option to all contained links.
* If you wish specific links to be ignored by a gallery that is applied to a container, you can use the class `lg-ignore`. If applied to a container, it will apply the option to all contained links.

### Advanced Options
`lightGallery` has numerous settings that can be used to customize the look, feel, and functionality of the gallery. Some default settings are implemented in `emma-lightbox` for a simple, clean look:
```
{
  download: false,
  plugins: [lgThumbnail],
  thumbnail: true,
  zoomFromOrigin: false,
}
```

These settings can be overridden (or added to) by defining `window.overrideLightGallerySettings` in your own compiled javascript within your child theme. This is also how you will apply your purchased license key.
```
window.overrideLightGallerySettings = {
	licenseKey: '########-########-########-########',
	plugins: [lgThumbnail, lgVideo],
};
```
Documentation of all available settings can be found [here](https://www.lightgalleryjs.com/docs/settings/). **Note:** the `selector` option is not overridable in the default implementation of `emma-lightbox`.

### Custom Implementation
If you need even more options, or need to be able to apply `lightGallery` to different galleries with different options, you can easily apply `lightGallery` directly within your own javascript following the `lightGallery` documentation [here](https://www.lightgalleryjs.com/docs/getting-started/).
