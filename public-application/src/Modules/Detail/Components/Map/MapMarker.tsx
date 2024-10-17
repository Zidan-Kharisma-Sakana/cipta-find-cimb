/* eslint-disable @typescript-eslint/no-explicit-any */
import { Marker, Popup, useMap } from "react-leaflet";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import { useEffect, useContext } from "react";
import CIMB from "../../../../assets/cimb_2.png";
import RedCircle from "../../../../assets/red_circle.png";
import L from "leaflet";
import { DataContext } from "../../Pages/DetailPage";
import { CATEGORY_DICTIONARY } from "../../../Home/Components/constant";

export const MarkerUser: React.FC<{ flyTo: boolean }> = ({ flyTo }) => {
  const { latitude, longitude, loading, error } = useGeolocation();
  const map = useMap();

  useEffect(() => {
    if (!!latitude && !!longitude && flyTo) {
      map.flyTo([latitude, longitude], 15);
    }
  }, [latitude, longitude, loading, error, flyTo, map]);

  if (!latitude || !longitude || loading || error) {
    return <div />;
  }
  return <Marker position={[latitude, longitude]} />;
};
type MarkerObjectSize = {
  [k1: string]: {
    [k2: string]: L.PointExpression;
  };
};
const MARKER_SIZE: MarkerObjectSize = {
  sm: {
    iconSize: [20, 20],
    iconAnchor: [10, 10],
    popupAnchor: [0, -10],
    shadowSize: [0, 0],
    shadowAnchor: [0, 0],
  },
  md: {
    iconSize: [40, 40],
    iconAnchor: [20, 20],
    popupAnchor: [0, -20],
    shadowSize: [0, 0],
    shadowAnchor: [0, 0],
  },
  lg: {
    iconSize: [60, 60],
    iconAnchor: [30, 70],
    popupAnchor: [0, -80],
    shadowSize: [16, 16],
    shadowAnchor: [8, 8],
  },
  xl: {
    iconSize: [60, 60],
    iconAnchor: [30, 80],
    popupAnchor: [0, -80],
    shadowSize: [10, 10],
    shadowAnchor: [5, 5],
  },
};

export const MarkerLocation: React.FC<{ position: L.LatLngExpression; size: keyof typeof MARKER_SIZE }> = ({
  position,
  size,
}) => {
  const { iconAnchor, iconSize, popupAnchor, shadowAnchor, shadowSize } = MARKER_SIZE[size];
  const data = useContext(DataContext) as any;

  return (
    <Marker
      icon={L.icon({
        iconUrl: CIMB,
        shadowUrl: RedCircle,
        iconAnchor,
        iconSize,
        popupAnchor,
        shadowAnchor,
        shadowSize,
      })}
      position={position}
    >
      <Popup>
        <div className="max-w-48">
          <h6 className="text-xs font-medium">
            {CATEGORY_DICTIONARY[data.type as keyof typeof CATEGORY_DICTIONARY]}
          </h6>
          <h5 className="font-bold mt-1">{data.name}</h5>
          <h6 className="line-clamp-3 mt-2">{data.address}</h6>
        </div>{" "}
      </Popup>
    </Marker>
  );
};