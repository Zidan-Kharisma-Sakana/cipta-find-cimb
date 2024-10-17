/* eslint-disable @typescript-eslint/no-explicit-any */
import Info from './Info';
import { DataContext } from '../Pages/DetailPage';
import { useContext } from 'react';

const InfoBox = () => {
  const data = useContext(DataContext) as any

    return (
        <>
            <div className="grid grid-cols-2 mt-6 gap-y-6">
            <Info title="Provinsi" value={data.province}/>
            <Info title="Kota/Kabupatan" value={data.city}/>
            <div className="col-span-2">
              <Info title="Alamat"value={data.address}/>
            </div>
            <Info title="Jam Operasional" value={`${data.open_hour}-${data.close_hour}`}/>
          </div>
        </>
    )
}

export default InfoBox;