/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { useMapEvent } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import React, { useState } from "react";
import { MarkerLocation, MarkerUser } from "./MapMarker";

const MapDetail: React.FC<{ data: any }> = ({ data }) => {
  const [markerSize, setMarkerSize] = useState("lg");

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
  return (
    <>
      <MarkerUser flyTo={false} />
      <MarkerLocation position={data.position} size={markerSize} />
    </>
  );
};

export default MapDetail;
