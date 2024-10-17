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
      </div>
      <img className="size-20" src={CIMB} />
    </div>
  );
};
