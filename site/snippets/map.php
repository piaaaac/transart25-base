<?php

/**
 * @param $selectedVenue – string slug
 * */
$venues = page("locations")->children()->listed();
$mapData = [];
foreach ($venues as $venue) {
  $imgUrl = $venue->img()->toFile()->thumb(300)->url();
  if ($venue->lat()->isNotEmpty() && $venue->lon()->isNotEmpty()) {
    $mapData[] = [
      "slug" => $venue->slug(),
      "title" => $venue->title()->value(),
      "description" => $venue->description()->value(),
      "address" => $venue->address()->value(),
      "city" => $venue->city()->value(),
      "lat" => $venue->lat()->value(),
      "lon" => $venue->lon()->value(),
      "mapsLink" => $venue->mapsLink()->value(),
      "imgUrl" => $imgUrl,
    ];
  }
}
?>

<div id="map" class="mapbox"></div>

<script>
  var venues = <?= json_encode($mapData) ?>;
  var selectedVenue = "<?= $selectedVenue ?>";
  console.log(venues);
  console.log(selectedVenue);
  var popupOpened = false;
  var markers = {};
  mapboxgl.accessToken = "pk.eyJ1IjoidHJhbnNhcnQiLCJhIjoiY2xrYXpnN3FtMGFxZTNmdGplN3BidHcxNyJ9.ekeee5bT5XN3Fvq9LnYNiQ";
  const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/transart/clyh2mh2900wn01pm6nor6khn",
    center: [11.34626311608904, 46.49834955578088],
    zoom: 3,
    attributionControl: false,
    cooperativeGestures: true,
    touchPitch: false,
    minZoom: 7,
  });
  map.addControl(new mapboxgl.AttributionControl({
    "compact": true
  }));
  map.addControl(new mapboxgl.NavigationControl({
    "showCompass": false
  }), 'top-right');
  map.scrollZoom.disable();
  map.touchZoomRotate.disableRotation();

  const geojson = {
    type: 'FeatureCollection',
    features: [],
  };
  venues.forEach(function(venue) {
    var desc = venue.description;
    if (venue.mapsLink) {
      desc += " <span class='directions'><a href='" + venue.mapsLink + "' target='_blank'><?= t("get_directions") ?></a>&nbsp;&rarr;</span>";
    }
    var feature = {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [+venue.lon, +venue.lat]
      },
      "properties": {
        "slug": venue.slug,
        "title": venue.title,
        "description": desc,
        "address": venue.address,
        "city": venue.city,
        "mapsLink": venue.mapsLink,
        "imgUrl": venue.imgUrl,
      }
    };
    geojson.features.push(feature);
  });

  for (const feature of geojson.features) {
    const el = document.createElement('div');
    el.className = 'marker';
    const popup = new mapboxgl.Popup({
        offset: 25
      })
      .setHTML(
        `<div class="flexo">
        <div class="left">
          <div class="img" onclick="visit('${feature.properties.mapsLink}');" style="background-image: url('${feature.properties.imgUrl}')"></div>
        </div>
        <div class="right">
          <h3>${feature.properties.title}</h3>
          <p>${feature.properties.description}</p>
        </div>
      </div>`
      )
    popup.__tr23_data = {
      "slug": feature.properties.slug
    };
    popup.on("close", function(p) {
      var thisSlug = p.target.__tr23_data.slug;
      if (thisSlug === selectedVenue && popupOpened) {
        selectedVenue = "";
        fitMap();
      }
    });

    const marker = new mapboxgl.Marker(el)
      .setLngLat(feature.geometry.coordinates)
      .setPopup(popup)
      .addTo(map);
    markers[feature.properties.slug] = marker;
  }

  if (selectedVenue !== "none") {
    selectItem(selectedVenue);
    popupOpened = true;
  } else {
    fitMap();
  }

  function fitMap() {
    bounds = new mapboxgl.LngLatBounds();
    geojson.features.forEach(function(feature) {
      bounds.extend(feature.geometry.coordinates);
    });
    map.fitBounds(bounds, {
      padding: 80
    });
  }

  function selectItem(slug) {
    var m = markers[slug];
    if (m) {
      m.togglePopup();
      const bbox = [m._lngLat, m._lngLat];
      map.fitBounds(bbox, {
        maxZoom: 13,
      });
    }
  }
</script>