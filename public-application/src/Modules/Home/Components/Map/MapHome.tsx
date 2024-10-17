/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { MapContainer, TileLayer, useMap, Marker, Popup, useMapEvent } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import React, { useEffect, useState } from "react";
import L from "leaflet";
import { MarkerLocation, MarkerUser } from "./MapMarker";
import { useFilter } from "../../../../Utils/useFilter";

const MapHome: React.FC = () => {
  const { latitude, longitude, loading, error } = useGeolocation();
  const [markerSize, setMarkerSize] = useState("sm");

  const m = useMapEvent("zoom", () => {
    if (m.getZoom() > 15) {
      setMarkerSize("xl");
    } else if (m.getZoom() > 14) {
      setMarkerSize("lg");
    } else if (m.getZoom() > 12) {
      setMarkerSize("md");
    } else {
      setMarkerSize("sm");
    }
  });
  const { data } = useFilter();

  if (!latitude || !longitude || loading || error) {
    return <div />;
  }
  return (
    <>
      <MarkerUser />
      {data.map((location, idx) => (
        <MarkerLocation key={"location-" + idx} location={location} size={markerSize} />
      ))}
    </>
  );
};

export default MapHome;
