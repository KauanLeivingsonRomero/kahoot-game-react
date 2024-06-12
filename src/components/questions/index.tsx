import React from 'react';
import './styles.css';
import QuestionTitle from './components/QuestionTitle';
import QuestionTimer from './components/QuestionTimer';
import QuestionPoints from './components/QuestionPoints';
import { BsFillTriangleFill, BsSquareFill , BsFillCircleFill , BsDiamondFill } from 'react-icons/bs';
import { UserAgent } from '@quentin-sommer/react-useragent';
import { QuestionProps } from './../../../types/questionProps';

const icons = [BsFillTriangleFill, BsSquareFill , BsFillCircleFill , BsDiamondFill]; 

const Question: React.FC<QuestionProps> = ({ question, options, onAnswer, image }) => {
  return (
    <div className='game animate__animated animate__backInDown'>
      <UserAgent computer>
        <QuestionTitle title={question}/>
        <div className='content'>
          <QuestionTimer />
          <img src={image} alt="alt" className='img'/>
          <QuestionPoints />
        </div>
        <div className='button-container'>
        {options?.map((button, index) => {
          const Icon = icons[index % icons.length];
          return(
            <button key={index} className='option-button' style={{backgroundColor: button.color}} onClick={() => onAnswer(button.value && button.color)}>
            <div style={{display: 'flex', flexDirection: 'row', justifyContent: 'center', alignItems: 'center', gap: 10}}>
              <Icon  size={25}/>
              <h4>{button.value}</h4>
            </div>
          </button>
          )
        })}
      </div>
      </UserAgent>

      <UserAgent mobile>
        <div className='content mt-4'>
          <QuestionTimer />
          <QuestionPoints />
        </div>
        <div className='button-container-mobile'>
        {options?.map((button, index) => {
          const Icon = icons[index % icons.length];
          return(
            <button key={index} className='option-button-mobile' style={{backgroundColor: button.color}} onClick={() => onAnswer(button.value)}>
            <Icon  size={45}/>
          </button>
          )
        })}
      </div>
      </UserAgent>
    </div>
  );
};

export default Question;
