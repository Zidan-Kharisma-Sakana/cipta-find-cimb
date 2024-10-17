/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { createContext, useContext, useState, ReactNode, useCallback, useEffect } from "react";
import { Branch } from "./type";
import toast from "react-hot-toast";

interface FilterContextProps {
  type: string;
  searchTerm: string;
  province: string;
  city: string;
  category: string;
  data: Branch[];
  setFilter: (filter: string, value: any) => void;
  findNearby: (lat: number, lon: number) => Promise<void>;
}

const FilterContext = createContext<FilterContextProps | undefined>(undefined);

export const FilterProvider: React.FC<{ children: ReactNode }> = ({ children }) => {
  const [type, setType] = useState("office");
  const [searchTerm, setSearchTerm] = useState("");
  const [province, setProvince] = useState("");
  const [city, setCity] = useState("");
  const [category, setCategory] = useState("");
  const [data, setData] = useState<Branch[]>([]);

  const setFilter = useCallback(
    (filter: string, value: string) => {
      switch (filter) {
        case "type":
          setType(value);
          break;
        case "searchTerm":
          setSearchTerm(value);
          break;
        case "category":
          setCategory(value);
          break;
        case "location":
          if (value.includes("Kota")) {
            setCity(value.split("Kota")[1].trim());
            setProvince("");
          } else if (value.includes("Provinsi")) {
            setCity("");
            setProvince(value.split("Provinsi")[1].trim());
          } else {
            setCity("");
            setProvince("");
          }
          break;
        default:
          console.error("Invalid filter");
      }
    },
    [setType, setSearchTerm, setCategory, setCity, setProvince] // Dependencies
  );

  useEffect(() => {
    async function getData() {
      toast.loading("Finding Locations...")
      const response = await fetch(
        `http://localhost:8000/api/${type}/filter?${new URLSearchParams({
          ...(searchTerm ? { name: searchTerm } : {}),
          ...(city ? { city } : {}),
          ...(province ? { province } : {}),
          ...(category ? { type: category } : {}),
        })}`
      );
      toast.dismiss()
      const result = await response.json();
      if (response.status === 200) {
        setData(result.data);
      } else {
        toast.error("Something went wrong")
        console.error(result);
        setData([]);
      }
    }
    getData();
  }, [searchTerm, type, province, city, category]);

  const findNearby = useCallback(
    async (lat: number, long: number) => {
      toast.loading("Finding Locations...")
      const response = await fetch(
        `http://localhost:8000/api/nearby${type === "office" ? "Branch" : "Atm"}?${new URLSearchParams({
          latitude: String(lat),
          longitude: String(long),
        })}`
      );
      toast.dismiss()
      const result = await response.json();
      if (response.status === 200) {
        setData(result.data);
      } else {
        toast.error("Something went wrong")
        console.error(result);
        setData([]);
      }
    },
    [type, setData]
  );

  return (
    <FilterContext.Provider value={{ data, type, searchTerm, province, city, category, setFilter, findNearby }}>
      {children}
    </FilterContext.Provider>
  );
};

export const useFilter = (): FilterContextProps => {
  const context = useContext(FilterContext);
  if (!context) {
    throw new Error("useFilter must be used within a FilterProvider");
  }
  return context;
};
