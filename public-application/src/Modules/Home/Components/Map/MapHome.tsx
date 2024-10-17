/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { MapContainer, TileLayer, useMap, Marker, Popup, useMapEvent } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import React, { useEffect, useState } from "react";
import L from "leaflet";
import { MarkerLocation, MarkerUser } from "./MapMarker";

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
  if (!latitude || !longitude || loading || error) {
    return <div />;
  }
  const locations: any[] = [];
  return (
    <>
      <MarkerUser />
      {locations.map((location, idx) => (
        <MarkerLocation key={"location-" + idx} position={[latitude, longitude]} size={markerSize} />
      ))}
    </>
  );
};

export default MapHome;
