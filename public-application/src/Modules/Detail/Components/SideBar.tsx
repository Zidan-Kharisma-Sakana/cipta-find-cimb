/* eslint-disable @typescript-eslint/no-unused-vars */
import { useNavigate } from "react-router-dom";
import Info from "./Info";

export default function SideBarDetail({ data }) {
  const navigate = useNavigate()
  return (
    <div className="w-full md:w-1/2 xl:w-1/3 border-r border-gray-400 p-8">
      <div onClick={()=> navigate("/")} className="cursor-pointer flex items-center w-max gap-x-2 mb-8">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          strokeWidth="1.5"
          stroke="currentColor"
          className="size-4"
        >
          <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        <p>Back</p>
      </div>
      <p className="text-gray-500">KCP</p>
      <div className="flex justify-between items-center">
        <h1 className="font-bold text-2xl">Nama cabang</h1>
        <div className="flex bg-cimbSecondary300 py-2 px-4 text-white font-medium items-center gap-x-4 text-sm">
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
          <p className="">Contact Us</p>
        </div>
      </div>
      <p className="text-sm text-gray-500">Jumlah Antrian: 4</p>
      <div className="grid grid-cols-2 mt-6 gap-y-6">
        <Info title="Provinsi" value="Jawa Timur" />
        <Info title="Kota/Kabupatan" value="Surabaya" />
        <div className="col-span-2">
          <Info title="Alamat" value="Jalan Kemenangan no 31, Kel. Huhuhaha Kec. heheh" />
        </div>
        <Info title="Jam Operasional" value="08.00-17.00" />
      </div>
    </div>
  );
}
