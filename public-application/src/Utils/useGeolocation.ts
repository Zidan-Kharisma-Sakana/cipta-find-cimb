/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { useEffect } from "react";
export function useGeolocation(options = {}) {
  const [state, setState] = React.useState({
    loading: true,
    accuracy: null,
    altitude: null,
    altitudeAccuracy: null,
    heading: null,
    latitude: null,
    longitude: null,
    speed: null,
    timestamp: null,
    error: null,
  });
  React.useEffect(() => {
    const onEvent = ({ coords, timestamp }) => {
      setState({
        loading: false,
        timestamp,
        latitude: coords.latitude,
        longitude: coords.longitude,
        altitude: coords.altitude,
        accuracy: coords.accuracy,
        altitudeAccuracy: coords.altitudeAccuracy,
        heading: coords.heading,
        speed: coords.speed,
        error: coords.error,
      });
    };

    const onEventError = (error: any) => {
      setState((s) => ({
        ...s,
        loading: false,
        error,
      }));
    };

    navigator.geolocation.getCurrentPosition(onEvent, onEventError);

    // const watchId = navigator.geolocation.watchPosition(onEvent, onEventError);

    return () => {
      // console.log("clear watch")
      // navigator.geolocation.clearWatch(watchId);
    };
  }, []);

  return state;
}
