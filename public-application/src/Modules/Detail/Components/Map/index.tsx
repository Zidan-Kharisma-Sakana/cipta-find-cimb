/* eslint-disable @typescript-eslint/no-unused-vars */
import { MapContainer, TileLayer, useMap, Marker, Popup } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import React, { useEffect } from "react";
import MapDetail from "./MapDetail";

const MapDetailContainer: React.FC = () => {
  const data = {
    position: [-6.1754, 106.8272]
  }
  return (
    <div className="fixed right-0 top-16 w-0 md:w-1/2 xl:w-2/3">
      <MapContainer center={[-6.1754, 106.8272]} className="h-[calc(100vh-64px)]" zoom={15} scrollWheelZoom={false}>
      <TileLayer
          attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        <MapDetail data={data} />
      </MapContainer>
    </div>
  );
};
export default MapDetailContainer;
