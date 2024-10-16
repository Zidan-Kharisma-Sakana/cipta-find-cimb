import { Marker, Popup, useMap } from "react-leaflet";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import { useEffect } from "react";
import CIMB from "../../../../assets/cimb_2.png";
import RedCircle from "../../../../assets/red_circle.png";
import L from "leaflet";

export const MarkerUser = ({ flyTo }) => {
  const { latitude, longitude, loading, error } = useGeolocation();
  const map = useMap();

  useEffect(() => {
    if (!!latitude && !!longitude && flyTo) {
      console.log("Heya");
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
        <PopUpData />
      </Popup>
    </Marker>
  );
};
const PopUpData = () => {
  return (
    <div className="max-w-48">
      <h6 className="text-sm font-medium">Kantor Cabang</h6>
      <h5 className="font-bold mt-1">Nama</h5>
      <h6 className="line-clamp-3 mt-2">Jl kucing 123 456 789 10 11 12 13 14 blabla blabla blabla</h6>
    </div>
  );
};
