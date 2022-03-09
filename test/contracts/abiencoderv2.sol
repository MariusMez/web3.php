pragma solidity >=0.4.19 <0.6.0;
pragma experimental ABIEncoderV2;

contract Tuple {
    struct T {int x; bool[2] y; address[] z;}

    struct S {uint a; uint[] b; T[] c;}

    function method(S memory s) public pure returns (S memory) {
        return s;
    }
}