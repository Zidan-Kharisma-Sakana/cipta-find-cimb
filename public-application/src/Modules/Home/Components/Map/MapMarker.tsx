import { Marker, Popup, useMap } from "react-leaflet";
import { useGeolocation } from "../../../../Utils/useGeolocation";
import { useEffect } from "react";
import CIMB from "../../../../assets/cimb_2.png";
import OCTO from "../../../../assets/octo2.png";

import RedCircle from "../../../../assets/red_circle.png";
import L from "leaflet";
import { Branch } from "../../../../Utils/type";
import { CATEGORY_DICTIONARY } from "../constant";

export const MarkerUser = () => {
  const { latitude, longitude, loading, error } = useGeolocation();
  const map = useMap();

  useEffect(() => {
    if (!!latitude && !!longitude) {
      console.log("Heya");
      map.flyTo([latitude, longitude], 15);
    }
  }, [latitude, longitude, loading, error, map]);

  if (!latitude || !longitude || loading || error) {
    return <div />;
  }
  return (
    <Marker
      icon={L.icon({
        iconUrl: OCTO,
        iconSize: [80, 80],
        iconAnchor: [40, 40],
        popupAnchor: [0, -40],
      })}
      position={[latitude, longitude]}
    />
  );
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

export const MarkerLocation: React.FC<{ size: keyof typeof MARKER_SIZE; location: Branch }> = ({ location, size }) => {
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
      position={[Number(location.latitude), Number(location.longitude)]}
    >
      <Popup>
        <div className="max-w-48">
          <h6 className="text-xs font-medium">
            {CATEGORY_DICTIONARY[location.type as keyof typeof CATEGORY_DICTIONARY]}
          </h6>
          <h5 className="font-bold mt-1">{location.name}</h5>
          <h6 className="line-clamp-3 mt-2">{location.address}</h6>
        </div>{" "}
      </Popup>
    </Marker>
  );
};
