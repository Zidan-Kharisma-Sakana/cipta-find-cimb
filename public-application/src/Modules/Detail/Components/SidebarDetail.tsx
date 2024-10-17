/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { useNavigate } from "react-router-dom";
import { useState, useContext } from "react";
import InfoBox from "./InfoBox";
import ReviewBox from "./ReviewBox";
import { DataContext } from "../Pages/DetailPage";
import { CATEGORY_DICTIONARY } from "../../Home/Components/constant";

export default function SideBarDetail() {
  const navigate = useNavigate();
  const data = useContext(DataContext) as any;
  const tabs = ["Info", "Ulasan"];

  const [activeTab, setActiveTab] = useState(0);
  const contents = [<InfoBox />, <ReviewBox />];
  if (!data) return <div />;
  return (
    <div className="w-full md:w-1/2 xl:w-1/3 border-r border-gray-400 p-8 h-screen overflow-y-auto">
      <div onClick={() => navigate("/")} className="cursor-pointer flex items-center w-max gap-x-2 mb-8">
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
      <p className="text-gray-500">{CATEGORY_DICTIONARY[data.type as keyof typeof CATEGORY_DICTIONARY]}</p>
      <div className="flex justify-between items-center">
        <h1 className="font-bold text-2xl">{data.name}</h1>
        <div className="flex bg-cimbSecondary300 py-2 px-4 text-white font-medium items-center gap-x-4 text-sm">
          <a
            className=""
            href={`https://api.whatsapp.com/send/?phone=${data.cp}&text&type=phone_number&app_absent=0`}
            target="blank"
          >
            Hubungi
          </a>
        </div>
      </div>

      <p className="text-sm text-gray-500">Jumlah Antrian: {data.queue}</p>
      <p>⭐{data.rate}/5</p>
      <div className="flex my-6 border-2 border-cimbPrimary rounded-full">
        {tabs.map((tab, index) => (
          <button
            key={index}
            className={`flex-1 py-2 rounded-full font-medium text- ${
              activeTab === index ? "bg-cimbSecondary300 text-white" : ""
            }`}
            onClick={() => setActiveTab(index)}
          >
            {tab}
          </button>
        ))}
      </div>
      <div className="tab-content">{contents[activeTab]}</div>
    </div>
  );
}
