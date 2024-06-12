import { useState, useEffect } from 'react';


const useCountdown = (initialCount: number, start: boolean, onFinish: () => void) => {

  const [count, setCount] = useState(initialCount);
  
  useEffect(() => {
    if (start && count > 0) {
      const timer = setTimeout(() => setCount(count - 1), 1000);
      return () => clearTimeout(timer);
    }
    if(count <= 0){
      onFinish()
    }
  }, [start, count, onFinish]);

  return count;
};

export default useCountdown;