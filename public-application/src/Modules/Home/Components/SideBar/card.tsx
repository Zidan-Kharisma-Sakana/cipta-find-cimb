import CIMB from "../../../../assets/cimb_2.png";

export const Card: React.FC = () => {
  return (
    <div className="border p-4 cursor-pointer rounded-xl ring-1 flex gap-x-2 items-center">
      <div className="flex-1">
        <p className="font-medium">Kantor Cabang Pembantu</p>
        <p className="font-bold text-lg">KCP Jakarta Pusat</p>
        <div className="border" />
        <address>Jln blablblabla</address>
      </div>
      <img className="size-20" src={CIMB} />
    </div>
  );
};
