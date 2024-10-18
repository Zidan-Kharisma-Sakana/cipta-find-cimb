/* eslint-disable @typescript-eslint/no-explicit-any */
import Info from './Info';
import { DataContext } from '../Pages/DetailPage';
import { useContext } from 'react';

const InfoBox = () => {
  const data = useContext(DataContext) as any
  const features: Array<String> = data.service_desc.split(",").map(item => item.trim())
  const productDictionary = {
    "Tabungan": "https://www.cimbniaga.co.id/id/personal/tabungan",
    "Kartu Kredit": "https://www.cimbniaga.co.id/id/personal/kartu-kredit", 
    "KPR": "https://www.cimbniaga.co.id/id/personal/kpr",
    "KTA": "https://www.cimbniaga.co.id/id/personal/kta",
    "Reksadana": "https://www.cimbniaga.co.id/id/personal/reksadana",
    "BancAssurance": "https://www.cimbniaga.co.id/id/personal/bancassurance",
    "Wakaf": "https://www.cimbniaga.co.id/id/personal/wakaf",
    "Treasury":"https://www.cimbniaga.co.id/id/personal/treasury",
    "Kartu Debit": "https://www.cimbniaga.co.id/id/personal/tabungan"
  }

  const features_value = (
    <ul>
      {features.map((item, index) => (
        <li key={index}><a href={productDictionary[item]} target='_blank'>{item}</a></li>
      ))}
    </ul>
  )
  
      return (
        <>
            <div className="grid grid-cols-2 mt-6 gap-y-6">
            <Info title="Provinsi" value={data.province}/>
            <Info title="Kota/Kabupatan" value={data.city}/>
            <div className="col-span-2">
              <Info title="Alamat"value={data.address}/>
            </div>
            <Info title="Jam Operasional" value={`${data.open_hour}-${data.close_hour}`}/>
              <Info title='Layanan' value={features_value}/>
          </div>
        </>
    )
}

export default InfoBox;