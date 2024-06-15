import { useContext, useEffect, useState } from "react";
import { COLORS } from "../../colors";
import './styles.css';
import { PointsContext } from "../../contexts/pointsContext";
import axios from "axios";
import { GameContext } from "../../contexts/gameContext";

const Scoreboard = () => {
  
  const { handleScoreboard } = useContext(PointsContext);
  const { handleResults } = useContext(GameContext);
  const [data, setData] = useState<any>([]);
  const [loading, setLoading] = useState(true);
  const [maxPoints, setMaxPoints] = useState(1); // Default to 1 to avoid division by zero

  useEffect(() => {
    if(handleResults === false){
      axios.get("http://localhost:8000/painel/proc/Controllers/getWinners.php")
        .then((response) => {
          setData(response.data);
          setLoading(false); // Data has been loaded
          const pointsArray = response.data.map((winner: any[]) => winner[1]);
          setMaxPoints(Math.max(...pointsArray)); // Set the maximum points for scaling
        })
        .catch((error) => {
          console.error('Error fetching winners:', error);
          setLoading(false); // Set loading to false even if there's an error
        });
    }
  }, [handleResults]);

  if (loading) {
    return <div>Loading...</div>; // Show a loading message or spinner
  }

  return(
    <>
    {handleScoreboard && data.length > 0 &&
      <div className='container-fluid p-0 results'>
        <h1 className='title'>Vencedores</h1>
        <div className='container-pillars'>
          <div className='pillars-center'>
            <div className='pillar-map'>
              <h3 className='pillar-text'>{data[1].name}</h3>
              <h5 className='pillar-text'>{data[1].points}</h5>
              <div className='pillar' style={{backgroundColor: COLORS.$silver, height: 85}}></div>
            </div>
            <div className='pillar-map'>
              <h3 className='pillar-text'>{data[0].name}</h3>
              <h5 className='pillar-text'>{data[0].points}</h5>
              <div className='pillar' style={{backgroundColor: COLORS.$gold, height: 150}}></div>
            </div>
            <div className='pillar-map'>
              <h3 className='pillar-text'>{data[2].name}</h3>
              <h5 className='pillar-text'>{data[2].points}</h5>
              <div className='pillar' style={{backgroundColor: COLORS.$bronze, height: 50}}></div>
            </div>
          </div>
        </div>
      </div>
    }
  </>
  );
}

export default Scoreboard;
