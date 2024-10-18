/* eslint-disable @typescript-eslint/no-unused-vars */
import { MapContainer, TileLayer, useMap, Marker, Popup } from "react-leaflet";
import "leaflet/dist/leaflet.css";
import React, { useEffect, useContext } from "react";
import MapDetail from "./MapDetail";
import { DataContext } from "../../Pages/DetailPage";

const MapDetailContainer: React.FC = () => {
  const dataC = useContext(DataContext)

  const data = {
    position: [Number(dataC.latitude), Number(dataC.longitude)]
  }
  return (
    <div className="fixed right-0 top-16 w-0 md:w-1/2 xl:w-2/3">
      <MapContainer center={data.position} className="h-[calc(100vh-64px)]" zoom={15} scrollWheelZoom={true}>
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
