/* eslint-disable @typescript-eslint/no-unused-vars */
import { MapContainer, TileLayer, useMap, Marker, Popup } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import React, { useEffect } from "react";
import MapHome from "./MapHome";

const MapHomeContainer: React.FC = () => {
  return (
    <div className="fixed right-0 top-16 w-0 md:w-1/2 xl:w-2/3">
      <MapContainer center={[-6.1754, 106.8272]} className="h-[calc(100vh-64px)]" zoom={10} scrollWheelZoom={false}>
        <TileLayer
          attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        <MapHome />
      </MapContainer>
    </div>
  );
};
export default MapHomeContainer;
