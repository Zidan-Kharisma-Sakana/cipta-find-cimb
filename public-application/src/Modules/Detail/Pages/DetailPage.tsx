/* eslint-disable @typescript-eslint/no-explicit-any */
import { useState } from "react";
import { useEffect, createContext } from "react";
import HomeLayout from "../../Layout/HomeLayout";
import MapDetailContainer from "../Components/Map/index";
import SideBarDetail from "../Components/SidebarDetail";
import { getBranch } from "../api";
import { useParams } from "react-router-dom";

export const DataContext = createContext(null);

function Detail() {
  return (
    <section className="w-full flex flex-col-reverse md:flex-row h-screen">
      <SideBarDetail />
      <MapDetailContainer />
    </section>
  );
}
export function DetailPage() {
  const { kacab_id } = useParams();
  const [data, setData] = useState({});
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function fetchData() {
      if (!kacab_id) return;
      const branch = await getBranch(kacab_id);
      setLoading(false);
      setData(branch);
    }
    fetchData();
  }, [kacab_id]);

  return (
    <HomeLayout>
      {loading ? (
        <>Loading</>
      ) : (
        <DataContext.Provider value={data as any}>
          <Detail />
        </DataContext.Provider>
      )}
    </HomeLayout>
  );
}
