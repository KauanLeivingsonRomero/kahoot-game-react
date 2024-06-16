import { useContext, useEffect, useState } from "react";
import { PusherContext } from "../../contexts/pusherContext";
import { COLORS } from "../../colors";
import './styles.css';

const UserList = () => {
  const [users, setUsers] = useState<{id: string, color: string}[]>([]);
  const {channel} = useContext(PusherContext);

  useEffect(() => {
    channel?.bind('pusher:subscription_succeeded', () => {
      channel.members.each((member: {id: string}) => addMemberToUserList(member.id))
    })

    const addMemberToUserList = (memberId: any) => {
      setUsers((prevUsers) => [
        ...prevUsers,
        {
          id: memberId,
          color: COLORS.$purple
        }
      ]);
    };

    const removeMemberFromUserList = (memberId: string) => {
      setUsers((prevUsers) => prevUsers.filter((user: {id: string}) => user.id !== memberId));
    };

    channel?.bind('pusher:member_added', (member: {id: string}) => {
      addMemberToUserList(member.id);
    });

    channel?.bind('pusher:member_removed', (member: {id: string}) => {
      removeMemberFromUserList(member.id);
    });

    return () => {
      channel?.unbind_all();
    };
  }, [channel, users, setUsers]);
  return(
    <div id="user_list" className="names">
      {users.map((user: {id: string, color: string}) => (
        
        <>
        {user.id != "admin" ? 
        <div
          className="animate__animated animate__bounceIn div-names"
          key={user.id}
          id={`user_${user.id}`}          
        >
          {user.id }
        </div> : 
        null
        }
       
        </>
        
      ))}
    </div>
  );
}

export default UserList;