import './style.css'

interface QuestionTitleProps {
  title: string;
}


const QuestionTitle:React.FC<QuestionTitleProps> = ({title}) => {
  return(
    <div className="fw-bold title p-2 mb-2">
      <h1>{title}</h1>
    </div>
  );
}

export default QuestionTitle;