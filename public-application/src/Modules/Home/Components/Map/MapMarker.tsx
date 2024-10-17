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
      <Popup minWidth={400}>
        <div className="w-[400px] flex items-start gap-x-4">
          <div className="flex-1">
            <h6 className="text font-medium">
              {CATEGORY_DICTIONARY[location.type as keyof typeof CATEGORY_DICTIONARY]}
            </h6>
            <h5 className="font-bold mt-1 text-xl">{location.name}</h5>
            <address className="line-clamp-3 mt-2">{location.address}</address>
            <div className="flex gap-x-8 mt-2 text-sm">
              <h6>{`⭐ ${location.rate}/5`}</h6>
              <div className="flex gap-x-4 items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth={1.5}
                  stroke="currentColor"
                  className="size-4"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                  />
                </svg>
                <h6>{location.cp}</h6>
              </div>
            </div>
          </div>
          <img
            className="size-[150px] rounded-xl"
            src={`http://localhost:8000/storage/${location.image_path}`}
            onError={(e) => {
              e.currentTarget.src = CIMB;
            }}
          />
        </div>
      </Popup>
    </Marker>
  );
};
