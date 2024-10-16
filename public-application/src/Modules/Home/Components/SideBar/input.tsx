import Select from "react-select";
import { CITY_OPTIONS } from "../constant";

export const SearchQueryInput = () => {
  return (
    <div>
      <input type="text" placeholder="Cari..." className="border w-full border-gray-300 rounded-sm px-3 py-1" />
    </div>
  );
};

export const LocationQueryInput = () => {
  return (
    <div>
      <Select
        placeholder="Provinsi, Kota, atau Kecamatan..."
        isClearable
        options={CITY_OPTIONS.map((c) => ({ value: c, label: c }))}
      />
    </div>
  );
};

export const NearestLocationInput = () => {
  return (
    <div className="rounded-lg border border-400 p-6 text-cimbPrimary flex items-center justify-center gap-4 border-cimbPrimary cursor-pointer hover:ring-1 hover:ring-cimbSecondary100 hover:bg-cimbSecondary100 hover:text-white hover:border-cimbSecondary100 transform duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="size-6">
        <path
          fillRule="evenodd"
          d="M5.37 2.257a1.25 1.25 0 0 1 1.214-.054l3.378 1.69 2.133-1.313A1.25 1.25 0 0 1 14 3.644v7.326c0 .434-.225.837-.595 1.065l-2.775 1.708a1.25 1.25 0 0 1-1.214.053l-3.378-1.689-2.133 1.313A1.25 1.25 0 0 1 2 12.354V5.029c0-.434.225-.837.595-1.064L5.37 2.257ZM6 4a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 6 4Zm4.75 2.75a.75.75 0 0 0-1.5 0v4.5a.75.75 0 0 0 1.5 0v-4.5Z"
          clipRule="evenodd"
        />
      </svg>

      <p>Cari yang Terdekat</p>
    </div>
  );
};
export const CategoryInput = () => {
  return (
    <div>
      <Select
        placeholder="Kantor Pusat, Kantor Cabang, dll ... "
        isClearable
        options={[
          {
            label: "Kantor Pusat",
            value: "Kantor Pusat",
          },
          {
            label: "Kantor Cabang",
            value: "Kantor Cabang",
          },
        ]}
      />
    </div>
  );
};
