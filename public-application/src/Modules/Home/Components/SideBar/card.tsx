/* eslint-disable @typescript-eslint/no-explicit-any */
import { useNavigate } from "react-router-dom";
import CIMB from "../../../../assets/cimb_2.png";
import { Branch } from "../../../../Utils/type";
import { CATEGORY_DICTIONARY } from "../constant";

export const Card: React.FC<{ data: Branch }> = ({ data }) => {
  const navigate = useNavigate();
  return (
    <div
      onClick={() => navigate(`/detail/${data.id}`)}
      className="border p-4 cursor-pointer rounded-xl ring-1 flex gap-x-2 items-center"
    >
      <div className="flex-1">
        <p className="font-medium text-sm">{CATEGORY_DICTIONARY[data.type as keyof typeof CATEGORY_DICTIONARY]}</p>
        <p className="font-bold text-lg">{data.name}</p>
        <div className="border my-1" />
        <address>{data.address}</address>
        <div className="flex gap-x-8 mt-2 text-sm">
          <p>{`⭐ ${data.rate}/5`}</p>
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
            <p>{data.cp}</p>
          </div>
        </div>
      </div>
      <img
        className="size-20"
        src={`http://localhost:8000/storage/${data.image_path}`}
        onError={(e) => {
          e.currentTarget.src = CIMB;
        }}
      />
    </div>
  );
};
