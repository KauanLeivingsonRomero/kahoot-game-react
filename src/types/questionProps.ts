export interface QuestionProps {
  question: string;
  options?: { value: string, color: string}[];
  image: string;
  onAnswer: (answer: string, color: string) => void;
  timer: number
}