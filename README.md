# WGS84-Lambert

Provides a simple REST API for converting latitude and longitude coordinates (WGS84 / GRS80 ellipsoid) to Lambert Conic Conformal Northing/Easting coordinates (Lambert 2008 projection, as used by ngi.be).

Implemented in PHP. Requires an HTTP server with URL rewriting (such as Apache with mod_rewrite).

## License

WGS84-Lambert is released under the GPL license.

It incorporates coordinate transformation code from https://gist.github.com/840476 and the Flight REST API framework http://flightphp.com/

## Installation

- clone this repository
- place inside a web server content directory
  - (testing has been performed with Apache; other web servers may require different configuration - specifically regarding the URL rewriting in .htaccess)

## Usage

`<URL base>/wgs84_lambert/[latitude]/[longitude]`

- `URL base` is the HTTP-accessible location of the content directory in which WGS84-Lambert is installed.
- `latitude` and `longitude` are numeric values representing the WGS84 coordinates of the point.

The response will be returned as JSON:
```
{
    "easting": [easting],
    "northing": [northing]
}
```

- `easting` and `northing` form the coordinates of the point in the Lambert 2008 projection.


## Example

Requesting this:
`<URL base>/wgs84_lambert/50.838687/4.361950`

will result in the following JSON response being returned:
```
{"easting":649520.58724165,"northing":669808.56333803}
```
